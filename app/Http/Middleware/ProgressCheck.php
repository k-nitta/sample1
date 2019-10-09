<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Cookie;

use App\Progress;
use App\Gamen;

class ProgressCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $path = $request->path();

        $progress_id = Cookie::get('progress_id');

        if (!$progress_id && ($path == '/' || $path == 'start')) {
            $progress_id = str_random(40);
            Cookie::queue('progress_id', $progress_id, 100);
            return redirect('/');
        }

        $progress = new Progress();
        $progress_data = $progress->findByProgressId($progress_id);

        if ($path == 'start' && !$progress_data) {
            Progress::updateOrCreate(
                ['progress_id' => $progress_id],
                ['gamen_id' => 1]
            );
            return redirect('tutorial');
        } else if ($path != '/' && !$progress_data) {
            return redirect('/');
        } else {
            $gamenModel = new Gamen();
            $gamen = $gamenModel->find($progress_data['gamen_id']);

            if ($path == 'start') {
                return redirect($gamen['url']);
            } else if ($path != '/') {
                if (($gamen['level'] == 1) && ($gamen['url'] != $path)) {
                    return redirect($gamen['url']);
                } else {
                    $path_gamen = $gamenModel->findByUrl($path);

                    if (!$path_gamen) {
                        return redirect('/');
                    }

                    if ($path_gamen['level'] == 1 && ($gamen['url'] != $path)) {
                        return redirect($gamen['url']);
                    }else if ($gamen['level'] > $path_gamen['level']) {
                        return redirect($path_gamen['url']);
                    } else if ($gamen['url'] != $path_gamen['url'] && $gamen['level'] == $path_gamen['level']) {
                        return redirect($gamen['url']);
                    }
                }
            }
        }

        return $next($request);
    }
}
