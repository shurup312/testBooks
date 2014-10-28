<?php

class ReportController extends Controller {

	public function actionIndex () {
		$sl = new ReportSearchList;
		$this->render(
			 'index',
			 array (
				 'report' => $sl->getResults()
			 )
		);
	}
}
