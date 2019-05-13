<?php
/**
 * @package    iitpConnect.Site
 *
 * @copyright  Copyright (C) 2018 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_EXEC') or die;

class HostelController extends BaseController
{
  public function __construct()
  { }

  public function updateDetails()
  {


    $request = new Request;

    $room_id = $request->get('room_id');

    $name_1 = $request->get('name_1');
    $roll_1  = $request->get('roll_1');
    $email_1 = $request->get('email_1');
    $mobile_1 = $request->get('mobile_1');
    $super_1 = $request->get('super_1');

    $name_2 = $request->get('name_2');
    $roll_2  = $request->get('roll_2');
    $email_2 = $request->get('email_2');
    $mobile_2 = $request->get('mobile_2');
    $super_2 = $request->get('super_2');

    $dt = $request->get('dt');
    $rs = $request->get('rs');
    $comment = $request->get('comment');
    $single = $request->get('single');

    $beds = $request->get('beds');
    $chairs = $request->get('chairs');
    $tables = $request->get('tables');
    $fans = $request->get('fans');
    $tubelights = $request->get('tubelights');

    $result = array('response' => 'error', 'text' => $name_1, 'sqlstate' => $mysql->sqlstate);
    echo json_encode($result);
    exit();
  }

  public function updateStock($romm_id, $beds, $chairs, $tables, $fans, $tubelights)
  {
    $app = new Factory;
    $mysql = $app->getDBO();
  }

  public function updateStatus($room_id, $st, $rs, $comment, $single)
  {
    $app = new Factory;
    $mysql = $app->getDBO();
  }

  public function updateOccupants($room_id, $name, $roll, $email, $super)
  {
    $app = new Factory;
    $mysql = $app->getDBO();
  }

  public function getBlockInfo($block)
  {
    $app = new Factory;
    $mysql = $app->getDBO();
    $sql = "SELECT * from hostel_info where blocks = '$block' ";
    $res = $mysql->query($sql);
    return $res;
  }

  public function addBlocks()
  {
    $request = new Request;

    $block = $request->get('blocks');
    $start = $request->get('start');
    $end  = $request->get('end');
    $number = $request->get('number');

    $app = new Factory;
    $mysql = $app->getDBO();

    $checkSql = "SELECT * FROM hostel_info WHERE blocks = '$block' ";

    $res = $mysql->query($checkSql);

    if (mysqli_num_rows($res) > 0) {
      $result = array('response' => 'error', 'text' => 'Block with this name exist.', 'type' => 'error');
      echo json_encode($result);
      exit();
    }

    $sql = "INSERT INTO hostel_info(blocks, start, end, number) VALUES ('" . $block . "','" . $start . "','" . $end . "','" . $number . "')";
    $mysql->query($sql);

    if ($mysql->connect_error) {
      $result = array('response' => 'error', 'text' => 'Error occurred.', 'sqlstate' => $mysql->sqlstate);
      echo json_encode($result);
      exit();
    } else {
      $result = array('response' => 'success', 'text' => 'Added', 'type' => 'success');
      echo json_encode($result);
      exit();
    }
  }

  public function getBlocks()
  {
    $app = new Factory;
    $mysql = $app->getDBO();
    $sql = "SELECT blocks from hostel_info ORDER BY blocks ASC";
    $res = $mysql->query($sql);
    return $res;
  }
}
