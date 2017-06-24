<?php
namespace Home\Controller;
use Think\Controller;
class MainpageController extends Controller {
	public function main(){
		$imgs = M("img")->select();
		// dump($imgs);
		$this->assign('imgs',$imgs);
		$this->display();
	}

}