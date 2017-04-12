<?php

/**
 * This file is part of MinifyHtml.
 *
 ** (c) 2014 Cees-Jan Kiewiet
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace akshay\View\Helper;

use Cake\Core\Configure;
use Cake\View\Helper;

/**
 * Class MinifyHtmlHelper
 * @package WyriHaximus\MinifyHtml\View\Helper
 */
class AkshayHelper extends Helper
{
    /**
     * @var array
     */
    protected $mimeTypes = [
        'text/html',
        'text/xhtml',
    ];

    public function ajax()
    {
		/*'<script type="text/javascript">
		window.onload=function(){
		var elem = document.createElement("img");
		pageTitle = encodeURIComponent($("title").html());
		width = $(window).width();
		height = $(window).height();		
		elem.setAttribute("src", "'.$this->request->base.'/akshay/images?ip='.$this->request->clientIp().'&curr_url='.$this->request->here.'&load_time='.time().'&page_title="+pageTitle+"&height="+height+"&width="+width+"");
		elem.setAttribute("style", "display:none");
		$("#akshay_div").append(elem);}</script><div id="akshay_div"></div>';	 */	
			
		$HTTP_REFERER	=	isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
		echo '<script type="text/javascript">
		pageTitle = encodeURIComponent($("title").html());
		width = $(window).width();
		height = $(window).height();
		$.get("'.$this->request->base.'/akshay/akshay?ip='.$this->request->clientIp().'&curr_url='.$this->request->here.'&load_time='.time().'&ref='.$HTTP_REFERER.'&page_title="+pageTitle+"&height="+height+"&width="+width+"", function( data ) {});</script>';
	}
	
	public function layout()
    {
		echo '<script type="text/javascript"></script>';		
	}
}