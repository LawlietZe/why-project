<?php
require_once 'conn.php';

function tree($id, $dep)
{
    $connection_string = "mysql:host=192.168.0.106;dbname=xyt_db";
    $db = new PDO($connection_string, 'root', '123123');
    $db->query("set names utf8");
    $sql = "select m.id,m.fid,u.user_name,m.content from msg_board as m inner join user_msg as u on m.uid = u.id where m.fid = $id";
    $conn = $db->query($sql);
    $rs = $conn->fetchAll();
    $rows = count($rs);
    $str = '<div style="border:1px solid #333; padding:5px 10px; margin:5px auto; background:#999; color:#fff;">';
    for ($i=0; $i < $rows; $i++) {
      $str .= "<a href='#'>";
      $str .= $rs[$i]['user_name'].'</a>';
      $str .= '回复';
      $str .= "<a href='#'>";
      $sql2 = "select m.id,m.fid,u.user_name from msg_board as m inner join user_msg as u on m.uid = u.id where m.id = m.$rs[$i]['fid']";
      $conn2 = $db->query($sql);
      $rs2 = $conn2->fetch();
      $str .= $rs2['user_name'].'</a>'.':';
        session_start();
      $uid = $_SESSION[username];
      $sql3 = "select id from user_msg where user_name = '$uid'";
      $conn3 = $db->query($sql3);
      $rs3 = $conn3->fetch();
      $uid2 =  $rs3['id'];
      echo $str.$rs[$i]['content']."<br/><a href=pub.php?uid=".$uid2."&dep=".($rs[$i]['dep'] + 1)."&fid=".$rs[$i]['id'].">reply</a><br>";
      echo '</div>';
      $str = '<div style="border:1px solid #333; padding:5px 10px; margin:5px auto; background:#999; color:#fff;">';
      tree($rs[$i]['id'], $rs[$i]['dep']);
    }

}


 ?>

<table>
  <tr>
    <td>
      <a href="pub.php?uid=<?php session_start(); echo $_SESSION[id] ?>">
          post a new content
      </a>
        <?php
        session_start();
        echo '欢迎你,'."<b>$_SESSION[username]</b>";
        ?>
    </td>
  </tr>
</table>

<?php
tree(0, 0);
 ?>
