<?php


    function time_elapsed_string($datetime, $full = false) {
            $now = new DateTime;
            $ago = new DateTime($datetime);
            $diff = $now->diff($ago);
        
            $diff->w = floor($diff->d / 7);
            $diff->d -= $diff->w * 7;
        
            $string = array(
                'y' => 'year',
                'm' => 'month',
                'w' => 'week',
                'd' => 'day',
                'h' => 'hour',
                'i' => 'minute',
                's' => 'second',
            );
            foreach ($string as $k => &$v) {
                if ($diff->$k) {
                    $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                } else {
                    unset($string[$k]);
                }
            }
        
            if (!$full) $string = array_slice($string, 0, 1);
            return $string ? implode(', ', $string) . ' ago' : 'just now';
        };

    if( isset($_POST['offset']) && isset($_POST['limit']) )
    {
        $limit = $_POST['limit'];
        $offset = $_POST['offset'];
        
        $conn = mysqli_connect("localhost", "isotechr_user1", "Darklord12345!", "isotechr_taskerapp");

        switch( $_POST['cat'] )
        {
            case "all":
            $data = mysqli_query($conn, "SELECT * FROM jobs WHERE status = 'active' ORDER BY id DESC LIMIT {$limit} OFFSET {$offset}");
            break;
            case "pics":
            $data = mysqli_query($conn, "SELECT * FROM jobs WHERE job_kind = 'pics' AND status = 'active' ORDER BY id DESC LIMIT {$limit} OFFSET {$offset}");
            break;
            case "videos":
            $data = mysqli_query($conn, "SELECT * FROM jobs WHERE job_kind = 'videos' AND status = 'active' ORDER BY id DESC LIMIT {$limit} OFFSET {$offset}");
            break;
            
        }
        
        
        $i = 0;
        while( $row = mysqli_fetch_array($data) )
        {
            if (strlen($row['job_title']) > 30)
            {
                $title = substr($row['job_title'], 0, 30) . '...';
            }
            else
            {
                $title = $row['job_title'];
            }

            switch( $row['job_subkind'] )
            {
                case 'cities':
                $img = 'city';
                $color = '#57C8D5';
                break;
                case 'beaches':
                $img = 'beaches';
                $color = '#ACD5D3';
                break;
                case 'accommodation':
                $img = 'accommodation';
                $color = '#25313B';
                break;
                case 'hotels':
                $img = 'hotels';
                $color = '#703F3F';
                break;
                case 'sport':
                $img = 'sports';
                $color = '#930000';
                break;
                case 'music':
                $img = 'music';
                $color = '#FEE187';
                break;
                case 'museums':
                $img = 'museums';
                $color = '#6E1D0B';
                break;
                case 'sights':
                $img = 'sights';
                $color = '#593737';
                break;
                case 'other':
                $img = 'other';
                $color = '#E03A00';
                break;
            }

            $data1 = mysqli_query($conn, "SELECT * FROM users WHERE userid = ".$row['user_id']);
            while($row1 = mysqli_fetch_array($data1))
            {
                $user['avatar'] = $row1['userpic'];
            }

            $tasks[$i]['TASK_CATEGORY'] = $row['job_kind'];
            $tasks[$i]['TASK_SUBCATEGORY'] = $row['job_subkind'];
            $tasks[$i]['TASK_STATUS'] = $row['status'];
            $tasks[$i]['TASK_CATEGORY_IMAGE'] = "images/".$img.".svg";
            $tasks[$i]['TASK_CATEGORY_COLOR'] = $color;
            $tasks[$i]['TASK_CREATOR_AVATAR'] = $user['avatar'];
            $tasks[$i]['TASK_TITLE'] = $title;
            $tasks[$i]['TASK_ID'] = $row['job_id'];
            $tasks[$i]['TASK_BUDGET'] = $row['job_budget'];
            $tasks[$i]['TASK_TIME_POSTED'] = "POSTED" . time_elapsed_string('@'. $row['time_posted']);
            $tasks[$i]['TASK_CITY'] = $row['city'];
            $tasks[$i]['TASK_COUNTRY'] = $row['country'];

            $i++;
        }

        
    }

    echo json_encode($tasks);