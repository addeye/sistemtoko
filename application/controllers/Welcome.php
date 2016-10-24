<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends My_controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_model','model');
	}

	public function index()
	{
		$total= array();
//		$pagedata['sales'] = $this->model->getTransSalesByLast30Day();
//		foreach($pagedata['sales'] as $key=>$row)
//		{
//			$total[] = $row->grand_total;
//		}
//		$pagedata['total_penjualan'] = array_sum($total);
		$pagedata['total_penjualan'] = $this->model->getSumByMonth();


		$pagedata['invoice'] = $this->model->getInvoiceNotSend();
		$pagedata['buytotal'] = $this->model->getTransBuyByLast30Day();
		$pagedata['kredit'] = $this->model->getTotalKredit();
		$gsales = $this->model->getGroupBySales();
		$gbuy = $this->model->getGroupByBuy();

		foreach($gsales as $row)
		{
			$datemonth[$row->month]=$row->total;
		}

		foreach($gbuy as $row)
		{
			$datemonthbuy[$row->month] = $row->total;
		}

		for($i=0; $i<12; $i++)
		{
			$data[] = array(
				'year'=> date('Y'),
				'month' => strlen($i)==2?$i:'0'.$i,
				'y' => isset($datemonth[$i+1])?$datemonth[$i+1]:0
			);
		}

		for($i=0; $i<12; $i++)
		{
			$databuy[] = array(
				'year'=> date('Y'),
				'month' => strlen($i)==2?$i:'0'.$i,
				'y' => isset($datemonthbuy[$i+1])?$datemonthbuy[$i+1]:0
			);
		}

		$pagedata['gbuy'] = $databuy;
		$pagedata['gsales'] = $data;
		$pagedata['big_item'] = $this->model->getItemBigBuying();

//		return var_dump($pagedata['big_item']);


		$this->template->output($pagedata,'admin/home');
		//$this->load->view('view_barcode');
	}

	function bikin_barcode($kode)
	{
//kita load library nya ini membaca file Zend.php yang berisi loader
//untuk file yang ada pada folder Zend
		$this->load->library('zend');

//load yang ada di folder Zend
		$this->zend->load('Zend/Barcode');

//generate barcodenya
//$kode = 12345abc;
		Zend_Barcode::render('code128', 'image', array('text'=>$kode), array());
	}
//end of class
}
