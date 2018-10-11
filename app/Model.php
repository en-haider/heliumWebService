<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    public function get_DateLastLogin($creat_at)
    {

            if (count($creat_at) >= 1) {
                $creat_at = new Carbon($creat_at);
                $now = Carbon::now();
         if ($creat_at->diffInMinutes($now) < 1) {
            return $lastOnline = "Last seen less than a minute ago";
        }

            elseif ($creat_at->diff($now)->h < 1) {
                return $lastOnline = $creat_at->diffInMinutes($now) > 1 ? sprintf(" %d minutes ago", $creat_at->diffInMinutes($now)) : sprintf("Last seen %d minute ago", $creat_at->diffInMinutes($now));
            } elseif ($creat_at->diff($now)->d < 1) {
                return $lastOnline = $creat_at->diffInHours($now) > 1 ? sprintf("%d hours ago", $creat_at->diffInHours($now)) : sprintf("Last seen %d hour ago", $creat_at->diffInHours($now));
            } elseif ($creat_at->diff($now)->d < 7) {
                return  $lastOnline = $creat_at->diffInDays($now) > 1 ? sprintf(" %d days ago", $creat_at->diffInDays($now)) : sprintf("Last seen %d day ago", $creat_at->diffInDays($now));
            } elseif ($creat_at->diff($now)->m < 1) {
                return $lastOnline = $creat_at->diffInWeeks($now) > 1 ? sprintf(" %d weeks ago", $creat_at->diffInWeeks($now)) : sprintf("Last seen %d week ago", $creat_at->diffInWeeks($now));
            } elseif ($creat_at->diff($now)->y < 1) {
                return  $lastOnline = $creat_at->diffInMonths($now) > 1 ? sprintf("%d months ago", $creat_at->diffInMonths($now)) : sprintf("Last seen %d month ago", $creat_at->diffInMonths($now));
            } else {
                return  $lastOnline = $creat_at->diffInYears($now) > 1 ? sprintf(" %d years ago", $creat_at->diffInYears($now)) : sprintf("Last seen %d year ago", $creat_at->diffInYears($now));
            }
            
        }
    }

}
