<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$this->load->library('session');
		$this->load->helper('form');
	}
	public function index()
	{
		$data['header'] = $this->load->view('header', '', TRUE);
		$data['footer'] = $this->load->view('footer', '', TRUE);

		$this->load->view('create', $data);
	}

	public function createemail()
	{
		$type = $this->input->post('edm-type');
		$title = $this->input->post('edm-title');
		$preheader = $this->input->post('edm-preheader');
		$microsite_url = "https://microsite.kaskus.co.id/edm/content/".$this->input->post('microsite_url');
		$share['fb'] = "https://www.facebook.com/sharer/sharer.php?u=".rawurlencode($this->input->post('edm-facebook'));
		$share['tw'] = "https://twitter.com/intent/tweet?text=".rawurlencode($this->input->post('edm-twitter'));
		$share['gg'] = "https://plus.google.com/share?url=".rawurlencode($this->input->post('edm-google'));

		setlocale(LC_TIME,"id-ID");
		$folder_name = $title." ".date("d-m-Y");
		if(!file_exists('assets/thread/'.$folder_name))
			mkdir('assets/thread/'.$folder_name);

			if($type == "promo"){
				$img = $this->input->post('promo-img');
				$link = $this->input->post('promo-link');
				$code = '<!DOCTYPE html>
				<html>
				<head>
				    <meta charset="UTF-8">
				    <meta property="title" content="'.$title.'" />
				    <meta property="description" content="" />
				    <title>'.$title.'</title>
				</head>

				<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" style="background-color:#DEE0E2;font-family: arial,helvetica, sans-serif;">
				    <center>
				        <table align="center" border="0" cellpadding="0" cellspacing="0" id="bodyTable" style="width:700px!important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; border: none; border-collapse: collapse;">
				            <tr>
				                <td align="center" valign="top" id="bodyCell">
				                    <table border="0" cellpadding="0" cellspacing="0" id="templateContainer" style="background: #f7f7f8;">';

					$content = '<!-- HEADER -->
				                        <tr>
				                            <td align="center" valign="top">
				                                <table border="0" cellpadding="0" cellspacing="0" width="700" id="templatePreheader" style="background-color: #f7f7f8;border-top: 1px solid #dadada;">

				                                    <tr>
				                                        <td valign="top" class="preheaderContent" style="font-size: 10px!important;color: #808080;padding-top:15px; padding-right:20px; padding-bottom:10px; padding-left:15px;" mc:edit="preheader_content01">
				                                            <a target="_blank" href="http://www.kaskus.co.id"><img src="https://s.kaskus.id/images/2015/11/04/275848_20151104044109.png" height="20" width="139" alt="logo" />
				                                            </a>
				                                        </td>
				                                        <td valign="top" width="250" class="preheaderContent" style="font-size: 10px!important;color: #808080;text-align:right;padding-top:13px; padding-right:15px; padding-bottom:10px; padding-left:0;" mc:edit="preheader_content02">
				                                            <table style="min-width:230px" border="0" cellpadding="0" cellspacing="0" width="100%">
				                                                <tr>
				                                                    <td valign="center" align="center" style="font-size: 14px!important;color: #808080; white-space:nowrap;">'.strftime("%B %Y").' </td>
				                                                    <td align="center" style="font-size: 14px!important;color: #808080; white-space:nowrap;">|</td>
				                                                    <td align="right" style="font-size: 14px!important;color: #808080; padding-right: 5px;white-space:nowrap;">Share</td>
				                                                    <td>
				                                                        <a target="_blank" href="'.$share['fb'].'" target="_blank"><img style="padding-left:5px;" src="https://s.kaskus.id/images/2016/02/12/8218158_20160212021242.png" height="27" width="27" alt="" />
				                                                        </a>
				                                                    </td>
				                                                    <td>
				                                                        <a target="_blank" href="'.$share['tw'].'" target="_blank"><img src="https://s.kaskus.id/images/2016/02/12/8218158_20160212021247.png" height="27" width="27" alt="" />
				                                                        </a>
				                                                    </td>
				                                                    <td>
				                                                        <a target="_blank" href="'.$share['gg'].'" target="_blank"><img src="https://s.kaskus.id/images/2016/02/12/8218158_20160212021252.png" height="27" width="27" alt="" />
				                                                        </a>
				                                                    </td>
				                                                </tr>
				                                            </table>
				                                        </td>
				                                    </tr>
				                                </table>
				                            </td>
				                        </tr>

				                        <!-- MAIN BANNER -->
				                        <tr>
				                            <td align="center" valign="top">
				                                <table border="0" cellpadding="0" cellspacing="0" width="700" >
				                                    <tr style="line-height:0; text-align:center;">
				                                        <a target="_blank" href="'.$link.'"><img style="width:100%; max-width:100%;" src="'.$img.'"></a>
				                                    </tr>
				                                </table>
				                            </td>
				                        </tr>
				                        <!--END OF MAIN BANNER-->'.file_get_contents('assets/template/code/footer-promo.txt', true).'
																<!-- FOOTER -->
																<tr>
																    <td align="center" style="background-color:#f1f1f3">
																        <span style="display:block; font-size:10px!important; color: #c0c1bc; padding-right: 20px;padding-bottom:10px;">Copyright © KASKUS '.strftime("%Y").'. All Rights Reserved</span>
																    </td>
																</tr>
																</table>
																</td>
																</tr>
																</table>
																</center>
																</body>
																</html>';
				$code_email = $code.'<!-- SUB-NAVIGATION -->
															<tr>
																	<td align="center" valign="top" style="background:#fff;">
																			<p class="head-title" style="margin-top:2px; margin-bottom:4px; color: #636363;font-size: 12px;line-height: 1.4; white-space:nowrap;"><span valign="top" class="preheaderContent" style="display:block; height:0;font-size: 0.1px!important;color: #fff; white-space:nowrap;" mc:edit="preheader_content00">'.$preheader.'</span> Untuk melihat tampilan di web browser Anda,
																			 <a target="_blank" href="'.$microsite_url.'" style="color: #1998ed;text-decoration: none;">Klik disini</a>
																			</p>
																	</td>
															</tr>'.$content;
				$code .= $content;
		}
		else if($type == "Custom"){
			$custom_code = $this->input->post('custom_code');
			$code = '<!DOCTYPE html>
								<html>
								<head>
										<meta charset="UTF-8">
										<meta property="title" content="'.$title.'" />
										<meta property="description" content="" />
										<title>'.$title.'</title>
								</head>

								<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" style="background-color:#DEE0E2;font-family: arial,helvetica, sans-serif;">
										<center>
												<table align="center" border="0" cellpadding="0" cellspacing="0" id="bodyTable" style="width:700px!important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; border: none; border-collapse: collapse;">
														<tr>
																<td align="center" valign="top" id="bodyCell">
																		<table border="0" cellpadding="0" cellspacing="0" id="templateContainer" style="background: #f7f7f8;">';

				$content = '<!-- HEADER -->
															<tr>
																	<td align="center" valign="top">
																			<table border="0" cellpadding="0" cellspacing="0" width="700" id="templatePreheader" style="background-color: #f7f7f8;border-top: 1px solid #dadada;">

																					<tr>
																							<td valign="top" class="preheaderContent" style="font-size: 10px!important;color: #808080;padding-top:15px; padding-right:20px; padding-bottom:10px; padding-left:15px;" mc:edit="preheader_content01">
																									<a target="_blank" href="http://www.kaskus.co.id"><img src="https://s.kaskus.id/images/2015/11/04/275848_20151104044109.png" height="20" width="139" alt="logo" />
																									</a>
																							</td>
																							<td valign="top" width="250" class="preheaderContent" style="font-size: 10px!important;color: #808080;text-align:right;padding-top:13px; padding-right:15px; padding-bottom:10px; padding-left:0;" mc:edit="preheader_content02">
																									<table style="min-width:230px" border="0" cellpadding="0" cellspacing="0" width="100%">
																											<tr>
																													<td valign="center" align="center" style="font-size: 14px!important;color: #808080; white-space:nowrap;">'.strftime("%B %Y").' </td>
																													<td align="center" style="font-size: 14px!important;color: #808080; white-space:nowrap;">|</td>
																													<td align="right" style="font-size: 14px!important;color: #808080; padding-right: 5px;white-space:nowrap;">Share</td>
																													<td>
																															<a target="_blank" href="'.$share['fb'].'" target="_blank"><img style="padding-left:5px;" src="https://s.kaskus.id/images/2016/02/12/8218158_20160212021242.png" height="27" width="27" alt="" />
																															</a>
																													</td>
																													<td>
																															<a target="_blank" href="'.$share['tw'].'" target="_blank"><img src="https://s.kaskus.id/images/2016/02/12/8218158_20160212021247.png" height="27" width="27" alt="" />
																															</a>
																													</td>
																													<td>
																															<a target="_blank" href="'.$share['gg'].'" target="_blank"><img src="https://s.kaskus.id/images/2016/02/12/8218158_20160212021252.png" height="27" width="27" alt="" />
																															</a>
																													</td>
																											</tr>
																									</table>
																							</td>
																					</tr>
																			</table>
																	</td>
															</tr>';
			$code_email = $code.'<!-- SUB-NAVIGATION -->
														<tr>
																<td align="center" valign="top" style="background:#fff;">
																		<p class="head-title" style="margin-top:2px; margin-bottom:4px; color: #636363;font-size: 12px;line-height: 1.4; white-space:nowrap;"><span valign="top" class="preheaderContent" style="display:block; height:0;font-size: 0.1px!important;color: #fff; white-space:nowrap;" mc:edit="preheader_content00">'.$preheader.'</span> Untuk melihat tampilan di web browser Anda,
																		 <a target="_blank" href="'.$microsite_url.'" style="color: #1998ed;text-decoration: none;">Klik disini</a>
																		</p>
																</td>
														</tr>'.$content.$custom_code.file_get_contents('assets/template/code/footer-promo.txt', true).'
														<!-- FOOTER -->
														<tr>
														    <td align="center" style="background-color:#f1f1f3">
														        <span style="display:block; font-size:10px!important; color: #c0c1bc; padding-right: 20px;padding-bottom:10px;">Copyright © KASKUS '.strftime("%Y").'. All Rights Reserved</span>
														    </td>
														</tr>
														</table>
														</td>
														</tr>
														</table>
														</center>
														</body>
														</html>';
			$code .= $content.$custom_code.file_get_contents('assets/template/code/footer-promo.txt', true);
		}
		else{
			$hero_img = $this->input->post('hero-img');
			$hero_link = $this->input->post('hero-link');
			$count = $this->input->post('thread-count');

			$code = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en" style="background:#ebebeb!important">
			  <head>
			    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			    <meta name="viewport" content="width=device-width">
			    <title>EDM Forum '.$type.'</title><style>@media only screen{html{min-height:100%;background:#f7f7f7}}@media only screen and (max-width:650px){.small-float-center{margin:0 auto!important;float:none!important;text-align:center!important}}@media only screen and (max-width:650px){.hide-for-large{display:block!important;width:auto!important;overflow:visible!important;max-height:none!important;font-size:inherit!important;line-height:inherit!important}}@media only screen and (max-width:650px){table.body table.container .hide-for-large{display:table!important;width:100%!important}}@media only screen and (max-width:650px){table.body table.container .show-for-large{display:none!important;width:0;mso-hide:all;overflow:hidden}}@media only screen and (max-width:650px){table.body img{width:auto;height:auto}table.body center{min-width:0!important}table.body .container{width:100%!important}table.body .columns{height:auto!important;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;box-sizing:border-box;padding-left:10px!important;padding-right:10px!important}table.body .columns .columns{padding-left:0!important;padding-right:0!important}table.body .collapse .columns{padding-left:0!important;padding-right:0!important}th.small-3{display:inline-block!important;width:25%!important}th.small-4{display:inline-block!important;width:33.33333%!important}th.small-6{display:inline-block!important;width:50%!important}th.small-8{display:inline-block!important;width:66.66667%!important}th.small-9{display:inline-block!important;width:75%!important}th.small-12{display:inline-block!important;width:100%!important}.columns th.small-12{display:block!important;width:100%!important}table.menu{width:100%!important}table.menu td,table.menu th{width:auto!important;display:inline-block!important}table.menu.vertical td,table.menu.vertical th{display:block!important}table.menu[align=center]{width:auto!important}}@media only screen and (max-width:650px){table.body img.full{width:100%}}@media only screen and (max-width:650px){.store-detail-td p,.store-detail-td+td,.store-item-td p,.store-item-td+td{font-size:12px!important}.store-item-td.harga p,.store-item-td.harga+td{font-size:16px!important}.hide-lg{display:block!important}}@media only screen and (max-width:650px){.hot-thread-title{font-size:12px;padding-left:0}}@media only screen and (max-width:320px){.hot-thread-title{font-size:14px}}@media only screen and (max-width:650px){.hot-thread-category{font-size:12px}}@media only screen and (max-width:511px){.card p{min-height:54px!important}}@media only screen and (min-width:328px) and (max-width:510px){.card p{min-height:70px!important}}@media only screen and (min-width:200px) and (max-width:327px){.card p{min-height:90px!important}}</style>
					</head>
					<body style="-moz-box-sizing:border-box;-ms-text-size-adjust:100%;-webkit-box-sizing:border-box;-webkit-text-size-adjust:100%;Margin:0;background:#ebebeb!important;box-sizing:border-box;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;min-width:100%;padding:0;text-align:left;width:100%!important">
					<span class="preheader" style="color:#f7f7f7;display:none!important;font-size:1px;line-height:1px;max-height:0;max-width:0;mso-hide:all!important;opacity:0;overflow:hidden;visibility:hidden">'.$preheader.'</span>
					<table class="body" style="Margin:0;background:#ebebeb!important;border-collapse:collapse;border-spacing:0;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;height:100%;line-height:1.3;margin:0;padding:0;text-align:left;vertical-align:top;width:100%">
					  <tr style="padding:0;text-align:left;vertical-align:top">
					    <td class="center" align="center" valign="top" style="-moz-hyphens:auto;-webkit-hyphens:auto;Margin:0;border-collapse:collapse!important;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;hyphens:auto;line-height:1.3;margin:0;padding:0;text-align:left;vertical-align:top;word-wrap:break-word">
					      <center data-parsed="" style="min-width:640px;width:100%">
					        <table align="center" class="container float-center" style="Margin:0 auto;background:#f7f7f7;border-collapse:collapse;border-spacing:0;float:none;margin:0 auto;padding:0;text-align:center;vertical-align:top;width:640px">
					          <tbody>
					            <tr style="padding:0;text-align:left;vertical-align:top">
					              <td style="-moz-hyphens:auto;-webkit-hyphens:auto;Margin:0;border-collapse:collapse!important;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;hyphens:auto;line-height:1.3;margin:0;padding:0;text-align:left;vertical-align:top;word-wrap:break-word">';

					$content = file_get_contents('assets/template/code/content-thread.txt', true);

					if($type == "sport")
						$content .=	'https://s.kaskus.id/img/seasonal/april2017/tematik/wp_background_fbolnaj5fgcx.png';
					else
						$content .=	'https://s.kaskus.id/img/seasonal/april2017/tematik/wp_background_fbolys4ly4ap.png';

					$content .=	'" height="50" style="-ms-interpolation-mode:bicubic;clear:both;display:block;max-width:100%;outline:0;text-decoration:none;width:auto"></th>
			                                    </tr>
			                                  </table>
			                                </th>
			                                <th class="small-6 large-6 columns last" valign="middle" style="Margin:0 auto;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0 auto;padding:0;padding-bottom:0;padding-left:5px;padding-right:5px;text-align:left;width:310px">
			                                  <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
			                                    <tr style="padding:0;text-align:left;vertical-align:top">
			                                      <th style="Margin:0;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left">
			                                        <p class="text-right" style="Margin:0;Margin-bottom:10px;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;margin-bottom:0;padding:0;text-align:right"><a style="Margin:0;color:#2199e8;float:right;font-family:Roboto,sans-serif;font-weight:400;line-height:1.3;margin:0;padding:0;padding-left:5px;text-align:left;text-decoration:none" href="'.$share['gg'].'"
																							 target="_blank"><img src="https://s.kaskus.id/images/2017/01/27/275848_20170127034854.png" style="-ms-interpolation-mode:bicubic;border:none;clear:both;display:block;max-width:100%;outline:0;text-decoration:none;width:auto"></a><a style="Margin:0;color:#2199e8;float:right;font-family:Roboto,sans-serif;font-weight:400;line-height:1.3;margin:0;padding:0;padding-left:5px;padding-right:5px;text-align:left;text-decoration:none" href="'.$share['tw'].'"
																							  target="_blank"><img src="https://s.kaskus.id/images/2017/01/27/275848_20170127034833.png" style="-ms-interpolation-mode:bicubic;border:none;clear:both;display:block;max-width:100%;outline:0;text-decoration:none;width:auto"></a><a style="Margin:0;color:#2199e8;float:right;font-family:Roboto,sans-serif;font-weight:400;line-height:1.3;margin:0;padding:0;padding-left:8px;padding-right:5px;text-align:left;text-decoration:none" href="'.$share['fb'].'"
																								target="_blank"><img src="https://s.kaskus.id/images/2017/01/27/275848_20170127034806.png" style="-ms-interpolation-mode:bicubic;border:none;clear:both;display:block;max-width:100%;outline:0;text-decoration:none;width:auto"></a></p>
																						 </th>
																					 </tr>
																				 </table>
																			 </th>
																		 </tr>
																	 </tbody>
																 </table>
															 </td>
														 </tr>
													 </table>';
				if($type == "Lifestyle")
					$content .= '<table bgcolor="#3498EA" style="border-collapse:collapse;border-spacing:0;padding:0 10px;text-align:left;vertical-align:top;width:100%" class="wrapper" align="center"><tr style="padding:0;text-align:left;vertical-align:top"><td class="wrapper-inner" style="-moz-hyphens:auto;-webkit-hyphens:auto;Margin:0;border-collapse:collapse!important;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;hyphens:auto;line-height:1.3;margin:0;padding:0;text-align:left;vertical-align:top;word-wrap:break-word"><table class="row" style="border-collapse:collapse;border-spacing:0;display:table;padding:0;position:relative;text-align:left;vertical-align:top;width:100%"><tbody><tr style="padding:0;text-align:left;vertical-align:top"><th class="small-12 large-12 columns first last" valign="middle" style="Margin:0 auto;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0 auto;padding:0;padding-bottom:0;padding-left:10px!important;padding-right:10px!important;text-align:left;width:630px"><table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%"><tr style="padding:0;text-align:left;vertical-align:top"><th style="Margin:0;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left"><table class="spacer" style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%"><tbody><tr style="padding:0;text-align:left;vertical-align:top"><td height="5px" style="-moz-hyphens:auto;-webkit-hyphens:auto;Margin:0;border-collapse:collapse!important;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:5px;font-weight:400;hyphens:auto;line-height:5px;margin:0;mso-line-height-rule:exactly;padding:0;text-align:left;vertical-align:top;word-wrap:break-word">&#xA0;</td></tr></tbody></table><p class="batch-title" style="Margin:0;Margin-bottom:10px;color:#fff;font-family:Roboto,sans-serif;font-size:14px;font-weight:500;line-height:1.3;margin:0;margin-bottom:0;padding:0;text-align:left">Weekend Highlights</p><table class="spacer" style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%"><tbody><tr style="padding:0;text-align:left;vertical-align:top"><td height="5px" style="-moz-hyphens:auto;-webkit-hyphens:auto;Margin:0;border-collapse:collapse!important;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:5px;font-weight:400;hyphens:auto;line-height:5px;margin:0;mso-line-height-rule:exactly;padding:0;text-align:left;vertical-align:top;word-wrap:break-word">&#xA0;</td></tr></tbody></table></th><th class="expander" style="Margin:0;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0!important;text-align:left;visibility:hidden;width:0"></th></tr></table></th></tr></tbody></table></td></tr></table>';

				$content .= '<!-- Hero Image -->
													 <table class="row collapse" style="border-collapse:collapse;border-spacing:0;display:table;padding:0;position:relative;text-align:left;vertical-align:top;width:100%">
														 <tbody>
															 <tr style="padding:0;text-align:left;vertical-align:top">
																 <th class="small-12 large-12 columns first last" style="Margin:0 auto;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0 auto;padding:0;padding-bottom:0;padding-left:0;padding-right:0;text-align:left;width:645px">
																	 <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
																		 <tr style="padding:0;text-align:left;vertical-align:top">
																			 <th style="Margin:0;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left">
																				 <center data-parsed="" style="min-width:610px;width:100%"><a target="_blank" href="'.$hero_link.'" style="Margin:0;color:#2199e8;font-family:Roboto,sans-serif;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left;text-decoration:none"><img src="'.$hero_img.'" align="center" class="float-center" style="-ms-interpolation-mode:bicubic;Margin:0 auto;border:none;clear:both;display:block;float:none;margin:0 auto;max-width:100%;outline:0;text-align:center;text-decoration:none;width:auto"></a></center>
																			 </th>
																			 <th class="expander" style="Margin:0;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0!important;text-align:left;visibility:hidden;width:0"></th>
																		 </tr>
																	 </table>
																 </th>
															 </tr>
														 </tbody>
													 </table>
													 <table class="row" style="border-collapse:collapse;border-spacing:0;display:table;padding:0;position:relative;text-align:left;vertical-align:top;width:100%">
			                       <tbody>
			                         <tr style="padding:0;text-align:left;vertical-align:top">
			                           <th class="small-12 large-12 columns first last" style="Margin:0 auto;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0 auto;padding:0;padding-bottom:0;padding-left:10px;padding-right:10px;text-align:left;width:630px">
			                             <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
			                               <tr style="padding:0;text-align:left;vertical-align:top">
			                                 <th style="Margin:0;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left">
			                                   <table class="spacer" style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
			                                     <tbody>
			                                       <tr style="padding:0;text-align:left;vertical-align:top">
			                                         <td height="20px" style="-moz-hyphens:auto;-webkit-hyphens:auto;Margin:0;border-collapse:collapse!important;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:20px;font-weight:400;hyphens:auto;line-height:20px;margin:0;mso-line-height-rule:exactly;padding:0;text-align:left;vertical-align:top;word-wrap:break-word">&#xA0;</td>
			                                       </tr>
			                                     </tbody>
			                                   </table>
			                                   <p style="Margin:0;Margin-bottom:10px;color:#6e6e6e;font-family:Roboto,sans-serif;font-size:16px;font-weight:700;line-height:26px;margin:0;margin-bottom:10px;padding:0;text-align:left"><img src="https://s.kaskus.id/img/seasonal/april2017/tematik/wp_background_fbol6qgt5cl9.png" style="-ms-interpolation-mode:bicubic;clear:both;display:block;float:left;margin-right:5px;max-width:100%;outline:0;text-decoration:none;width:auto">Popular Threads</p>
			                                 </th>
			                                 <th class="expander" style="Margin:0;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0!important;text-align:left;visibility:hidden;width:0"></th>
			                               </tr>
			                             </table>
			                           </th>
			                         </tr>
			                       </tbody>
			                     </table>
			                     <table class="spacer" style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
			                       <tbody>
			                         <tr style="padding:0;text-align:left;vertical-align:top">
			                           <td height="10px" style="-moz-hyphens:auto;-webkit-hyphens:auto;Margin:0;border-collapse:collapse!important;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:10px;font-weight:400;hyphens:auto;line-height:10px;margin:0;mso-line-height-rule:exactly;padding:0;text-align:left;vertical-align:top;word-wrap:break-word">&#xA0;</td>
			                         </tr>
			                       </tbody>
			                     </table>';
			for($i=1;$i<=$count;$i++)
			{
				$img = $this->input->post('image-thread'.$i);
				$link = $this->input->post('link-thread'.$i);
				$title = $this->input->post('title-thread'.$i);
				$content .= '<table class="row" style="border-collapse:collapse;border-spacing:0;display:table;padding:0;position:relative;text-align:left;vertical-align:top;width:100%">
					<tbody>
						<tr style="padding:0;text-align:left;vertical-align:top">
							<th class="small-4 large-4 columns first" valign="top" style="Margin:0 auto;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0 auto;padding:0;padding-bottom:0;padding-left:10px;padding-right:5px;text-align:left;width:203.33px">
								<table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
									<tr style="padding:0;text-align:left;vertical-align:top">
										<th style="Margin:0;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left"><a href="'.$link.'" target="_blank" style="Margin:0;color:#2199e8;font-family:Roboto,sans-serif;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left;text-decoration:none"><img class="float-left" src="'.$img.'" alt="" style="-ms-interpolation-mode:bicubic;border:none;clear:both;display:block;float:left;max-width:100%;outline:0;text-align:left;text-decoration:none;width:auto"></a></th>
									</tr>
								</table>
							</th>
							<th class="small-8 large-8 columns last" valign="top" style="Margin:0 auto;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0 auto;padding:0;padding-bottom:0;padding-left:5px;padding-right:10px;text-align:left;width:416.67px">
								<table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
									<tr style="padding:0;text-align:left;vertical-align:top">
										<th style="Margin:0;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left">
											<a href="'.$link.'" target="_blank" style="Margin:0;color:#2199e8;font-family:Roboto,sans-serif;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left;text-decoration:none">
												<h4 class="hot-thread-title" style="-moz-hyphens:none;-ms-hyphens:none;-webkit-hyphens:none;Margin:0;Margin-bottom:10px;color:#545454;font-family:Roboto,sans-serif;font-size:17px;font-weight:700;hyphens:none;line-height:1.3;margin:0;margin-bottom:5px;padding:0;padding-left:5px;text-align:left;word-wrap:normal">'.$title.'</h4>
												<!--<p class="hot-thread-category">"Dateng jauh-jauh cuma buat digebok doang" - Essien (pemain terkenal)</p>-->
											</a>
										</th>
									</tr>
								</table>
							</th>
						</tr>
					</tbody>
				</table>
				<table class="spacer" style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
					<tbody>
						<tr style="padding:0;text-align:left;vertical-align:top">
							<td height="10px" style="-moz-hyphens:auto;-webkit-hyphens:auto;Margin:0;border-collapse:collapse!important;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:10px;font-weight:400;hyphens:auto;line-height:10px;margin:0;mso-line-height-rule:exactly;padding:0;text-align:left;vertical-align:top;word-wrap:break-word">&#xA0;</td>
						</tr>
					</tbody>
				</table>';
			}
			$content .= file_get_contents('assets/template/code/footer-thread.txt').'
																																							<!-- CopyRight -->
																																							<table class="row collapse" style="border-collapse:collapse;border-spacing:0;display:table;padding:0;position:relative;text-align:left;vertical-align:top;width:100%">
																																								<tbody>
																																									<tr style="padding:0;text-align:left;vertical-align:top">
																																										<th class="small-12 large-12 columns first last" style="Margin:0 auto;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0 auto;padding:0;padding-bottom:0;padding-left:0;padding-right:0;text-align:left;width:645px">
																																											<table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
																																												<tr style="padding:0;text-align:left;vertical-align:top">
																																													<th style="Margin:0;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left">
																																														<center data-parsed="" style="min-width:610px;width:100%">
																																															<p class="text-center float-center" style="Margin:0;Margin-bottom:10px;color:#c0c1bc;font-family:Roboto,sans-serif;font-size:12px!important;font-weight:400;line-height:1.3;margin:0;margin-bottom:10px;padding:0;text-align:center" align="center">Copyright © KASKUS '.strftime("%Y").'. All Rights Reserved</p>
																																														</center>
																																													</th>
																																													<th class="expander" style="Margin:0;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0!important;text-align:left;visibility:hidden;width:0"></th>
																																												</tr>
																																											</table>
																																										</th>
																																									</tr>
																																								</tbody>
																																							</table>
																																							<table class="spacer" style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
																																								<tbody>
																																									<tr style="padding:0;text-align:left;vertical-align:top">
																																										<td height="20px" style="-moz-hyphens:auto;-webkit-hyphens:auto;Margin:0;border-collapse:collapse!important;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:20px;font-weight:400;hyphens:auto;line-height:20px;margin:0;mso-line-height-rule:exactly;padding:0;text-align:left;vertical-align:top;word-wrap:break-word">&#xA0;</td>
																																									</tr>
																																								</tbody>
																																							</table>
																																						</td>
																																					</tr>
																																				</table>
																																				</td>
																																				</tr>
																																				</tbody>
																																				</table>
																																				</center>
																																				</td>
																																				</tr>
																																				</table>
																																				<!-- prevent Gmail on iOS font size manipulation -->
																																				<div style="display:none;white-space:nowrap;font:15px courier;line-height:0">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
																																				</body>
																																				</html>';
				$code_email = $code.'<!-- Microsite Link -->
				<table class="row collapse" style="border-collapse:collapse;border-spacing:0;display:table;padding:0;position:relative;text-align:left;vertical-align:top;width:100%">
					<tbody>
						<tr style="padding:0;text-align:left;vertical-align:top">
							<th class="small-12 large-12 columns first last" style="Margin:0 auto;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0 auto;padding:0;padding-bottom:0;padding-left:0;padding-right:0;text-align:left;width:645px">
								<table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
									<tr style="padding:0;text-align:left;vertical-align:top">
										<th style="Margin:0;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left">
											<center data-parsed="" style="min-width:610px;width:100%">
												<p class="text-center notice float-center" style="Margin:0;Margin-bottom:10px;background:#fffee9;color:brown;font-family:Roboto,sans-serif;font-size:10px;font-weight:700;line-height:1.3;margin:0;margin-bottom:0;padding:5px;position:relative;text-align:center" align="center">Untuk melihat tampilan di web browser Anda,
												 <a href="'.$microsite_url.'" target="_blank" style="Margin:0;color:#2199e8;font-family:Roboto,sans-serif;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left;text-decoration:none">Klik Disini</a></p>
											</center>
										</th>
										<th class="expander" style="Margin:0;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0!important;text-align:left;visibility:hidden;width:0"></th>
									</tr>
								</table>
							</th>
						</tr>
					</tbody>
				</table>'.$content;
				$code .= $content;
		}
		$this->session->set_flashdata('code', $code);
		$this->session->set_flashdata('code_email', $code_email);
		file_put_contents('assets/thread/'.$folder_name.'/index.html', $code);
		file_put_contents('assets/thread/'.$folder_name.'/index_email.html', $code_email);
		$this->session->set_flashdata('folder_name', $folder_name);
		redirect('/home/result');
	}

	public function result()
	{
		$data['header'] = $this->load->view('header', '', TRUE);
		$data['footer'] = $this->load->view('footer', '', TRUE);

		$this->load->view('result', $data);
	}
}
