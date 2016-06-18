<?php
/**
 * @package		mod_offline_site_countdown
 * @subpackage	mod_offline_site_countdown
 * @copyright	Nazha Ahmad Giugno 2016
 */
 
// no direct access
defined('_JEXEC') or die;
JHtml::_('behavior.keepalive');

$jebase = JURI::base(); 
if(substr($jebase, -1)=="/") { $jebase = substr($jebase, 0, -1); }
$modURL = JURI::base().'modules/mod_offline_site_countdown';
	
// get parameters

$backgroundcolor = $params->get ( 'backgroundcolor' );
$enableBackgroundColor = $params->get ( 'enableBackgroundColor' );
$logo = $params->get ( 'logo');
$siteName = $params->get ( 'siteName' );
$endDate = $params->get ( 'endDate' );
$timeZone = $params->get ( 'timeZone' );
$defaultSubMessage = $params->get ( 'defaultSubMessage' );
$titleMsg = $params->get ( 'titleMsg' );
$desriptionPart1 = $params->get ( 'desriptionPart1' );
$desriptionPart2 = $params->get ( 'desriptionPart2' );


if ($enableBackgroundColor === '0') {
	$backgroundcolor = 'none';
}

$style = '
		.wrapper{background:' . $backgroundcolor . ' ; },
		';

// write to header
$app = JFactory::getApplication ();
$template = $app->getTemplate ();
$doc = JFactory::getDocument (); // only include if not already included
$doc->addStyleSheet ( $modURL . '/css/style.css' );

if ($params->get ( 'jQuery' )) {
	$doc->addScript ( 'http://code.jquery.com/jquery-latest.pack.js' );
} else {
	$doc->addScript ( 'https://code.jquery.com/jquery-1.12.3.min.js' );
}

// write to header
$app = JFactory::getApplication ();
$template = $app->getTemplate ();
$doc = JFactory::getDocument (); // only include if not already included
$doc->addScript ( $modURL . '/js/moment.js' );
$doc->addScript ( $modURL . '/js/moment-timezone-with-data.js' );
$doc->addStyleSheet ( $modURL . '/css/style.css' );

$doc->addStyleDeclaration ( $style );
//remove it if dont need it 
$imageUrl = !empty(trim($logo)) ? JURI::base().$logo : $modURL.'/img/logo.png';
?>
<!-- ********************************************************************************************************* -->
 <script type="text/javascript">
  jQuery.noConflict();
  jQuery(document).ready(function($){
  	 function timer(settings){
  	        var config = {
  	            endDate: '<?php echo trim($endDate);?>',
  	            timeZone: '<?php  trim($timeZone);?>',
  	    	    hours: $('#hours'),
  	    	    minutes: $('#minutes'),
  	    	    seconds: $('#seconds'),
  	    	    newSubMessage: '<?php echo trim($defaultSubMessage);?>'
  	        };
  	        function prependZero(number){
  	            return number < 10 ? '0' + number : number;
  	        }
  	        $.extend(true, config, settings || {});
  	        var currentTime = moment();
  	        var endDate = moment.tz(config.endDate, config.timeZone);
  	        var diffTime = endDate.valueOf() - currentTime.valueOf();
  	        var duration = moment.duration(diffTime, 'milliseconds');
  	        var days = duration.days();
  	        var interval = 1000;
  	        var subMessage = $('.sub-message');
  	        var clock = $('.clock');
  	        if(diffTime < 0){
  	            endEvent(subMessage, config.newSubMessage, clock);
  	            return;
  	        }
  	        if(days > 0){
  	            $('#days').text(prependZero(days));
  	            $('.days').css('display', 'inline-block');
  	        }
  	        var intervalID = setInterval(function(){
  	            duration = moment.duration(duration - interval, 'milliseconds');
  	            var hours = duration.hours(),
  	                minutes = duration.minutes(),
  	                seconds = duration.seconds();
  	            days = duration.days();
  	            if(hours  <= 0 && minutes <= 0 && seconds  <= 0 && days <= 0){
  	                clearInterval(intervalID);
  	                endEvent(subMessage, config.newSubMessage, clock);
  	                window.location.reload();
  	            }
  	            if(days === 0){
  	                $('.days').hide();
  	            }
  	            $('#days').text(prependZero(days));
  	            config.hours.text(prependZero(hours));
  	            config.minutes.text(prependZero(minutes));
  	            config.seconds.text(prependZero(seconds));
  	        }, interval);
  	    }
  	    function endEvent($el, newText, hideEl){
  	        $el.text(newText);
  	        hideEl.hide();
  	    }
  	    timer();
      });
  </script>
<!-- ********************************************************************************************************* -->
	<div class="wrapper">
				<img src="<?php echo $imageUrl ; ?>" alt="<?php echo htmlspecialchars($siteName);?>" />
			<h1>
				<?php echo htmlspecialchars($siteName); ?>
			</h1>
	    <div class="clear-loading spinner">
	        <span></span>
	    </div>
	    <h1><?php echo $titleMsg;?></h1>
	    <h2><?php echo $desriptionPart1;?> <span class="sub-message"><?php echo $desriptionPart2;?></span></h2>
	
	    <div class="clock">
	        <div class="column days">
	            <div class="timer" id="days"></div>
	            <div class="text">DAYS</div>
	        </div>
	        <div class="timer days">:</div>
	        <div class="column">
	            <div class="timer" id="hours"></div>
	            <div class="text">HOURS</div>
	        </div>
	        <div class="timer">:</div>
	        <div class="column">
	            <div class="timer" id="minutes"></div>
	            <div class="text">MINUTES</div>
	        </div>
	        <div class="timer">:</div>
	        <div class="column">
	            <div class="timer" id="seconds"></div>
	            <div class="text">SECONDS</div>
	        </div>
    </div>
 
<!-- ********************************************************************************************************* -->













