$ug_admin = 4;
$ug_staff = 10;
$ug_apprentice = 8;

$mydb = new wpdb('ygscansc_kiri', 'dbpass100!', 'ygscansc_mybb', 'localhost');

function query($ug, $mydb) {

        $rows = $mydb -> get_results("SELECT U.username, U.avatar, U.uid, F.fid4 as quote, U.avatartype, P.positions
            FROM ygsmybb_users AS U, ygsmybb_userfields AS F,

            (SELECT U.uid AS id, GROUP_CONCAT(G.title SEPARATOR ', ') AS positions FROM ygsmybb_users as U INNER JOIN ygsmybb_usergroups as G on(U.additionalgroups LIKE CONCAT(G.gid, ',%')) or(U.additionalgroups like CONCAT('%,', G.gid)) or(U.additionalgroups like CONCAT('%,', G.gid, ',%')) or(U.additionalgroups like G.gid) GROUP BY U.uid) AS P

            WHERE F.ufid = U.uid AND P.id = U.uid AND U.usergroup = ".$ug.";
            ");

 return $rows;
}

        function getIMG($imgsrc, $imgType) {
            if ($imgType === 'remote') {
                return $imgsrc;
            }
            elseif($imgType === 'upload') {
                return 'http://forum.ygscans.com'.substr($imgsrc, 1);
            } else {
                return 'https://secure.gravatar.com/avatar/b9dd0a32786f109de83837db66ee07f9?s=96&d=mm&r=g';
            }
        }

        function getQuote($quote) {
            if ($quote) {
                return $quote;
            } else {
                return "I'm a Yummy Gummy staff member!";
            }
        }

        function getPM($id) {
            return "http://forum.ygscans.com/private.php?action=send&uid=".$id;
        }

        function getProfile($id) {
            return "http://forum.ygscans.com/member.php?action=profile&uid=".$id;
        }

        $admins = query($ug_admin, $mydb);
        $staff = query($ug_staff, $mydb);


        function printList($list) {
            echo '<center>';

            foreach($list as $obj):
                echo '<div style="font-size:0px; height: 200px; width: 350px; background-color: white; border: 1px solid black; vertical-align: top; margin-bottom: 20px;"><div style="position: relative; display:inline-block; height: 57%; width: 50%; border-right: 1px solid #ffcb5a; margin-top:6px;">
             <img src = "http://svgshare.com/i/1bN.svg"
            width = "70%;"
            height = "70%"
            class = "testcenter">
</div>

            <div style = "position: relative; display:inline-block; height: 57%; width:48%; font-size:12px; vertical-align: top; margin-top:6px; line-height:40%" >
                <center>
                <br></br><span style="line-height:90%"><em>"'.getQuote($obj->quote).'"</em></span>
<br></br><img src="'.getIMG($obj->avatar, $obj->avatartype).'" width="40%;" height="40%"><br></br><div style="width: 70%; text-align:left; line-height: 90%"> <a href = "'.getPM($obj->uid).'"><i class = "button__icon icon icon-reader"></i> Send a message</a>
                <a href = "'.getProfile($obj->uid).'"><i class = "button__icon icon icon-reader"> </i> View profile</a>
                </div></center></div>

            <div style = "height: 30%; width: 100%; padding-left: 10px; text-align: left" >
                <span style = "font-size:24px; font-family: Oswald;"><strong> '.$obj->username.' </strong></span >
                <br> <span style = "font-size:14px; font-family: Merriweather; color: #777777" > '.$obj->positions.'</span></div><div style="font-size:0px; margin: 0px; display:inline-block; height: 10%; width: 100%;" >
                <div style = "margin: 0px; display:inline-block; height: 100%; width: 25%; background-color: #e95959"></div><div style = "margin: 0px; display:inline-block; height: 100%; width: 25%; background-color: #ffcb5a"></div><div style = "margin: 0px; display:inline-block; height: 100%; width: 25%; background-color: #b8e959"></div><div style = "margin: 0px; display:inline-block; height: 100%; width: 25%; background-color: #5985e9"></div></div></div>';

            endforeach;

            echo '</center>';
        }

printList($admins);
printList($staff);
