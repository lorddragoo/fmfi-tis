<?php /* Smarty version Smarty-3.1.11, created on 2012-11-14 16:09:16
         compiled from "application\views\javascript\timeline.js" */ ?>
<?php /*%%SmartyHeaderCode:2922450a26e19407b59-73318580%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '59e2ae8364a3e439df0ad0c564185cfe358b4134' => 
    array (
      0 => 'application\\views\\javascript\\timeline.js',
      1 => 1352905753,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2922450a26e19407b59-73318580',
  'function' => 
  array (
  ),
  'cache_lifetime' => 3600,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50a26e194bd213_44565630',
  'variables' => 
  array (
    'start_year' => 0,
    'end_year' => 0,
  ),
  'has_nocache_code' => true,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50a26e194bd213_44565630')) {function content_50a26e194bd213_44565630($_smarty_tpl) {?>$(document).ready(function(){
    
    var knownPhysicists = new Array();
    
    /**
     * This function will renew lists of physicists and inventions after stop sliding in slider.
     */
    sliderOnStop = function(event, ui) {
        var selected_year = ui.value;
        
        $('#timeline').slider('disable');
        
        var urlPatern = '<?php echo smartyCreateUri(array('controller'=>"timeline",'action'=>"ajaxUpdateList",'params'=>array("-YEAR-")),$_smarty_tpl);?>
';
        $.ajax(urlPatern.replace('-YEAR-', selected_year), {
            cache: false,
            dataType: 'json',
            success: function(data) {
                $('#physicists_container').html(data.physicists);
                $('#inventions_container').html(data.inventions);
            },
            complete: function() {
                $('#timeline').slider('enable');
            }
        });
    }
    
    /**
     * Updates information slider information box.
     */
    updateHandleInfo = function() {
        var pos = $('#timeline .ui-slider-handle').offset();
        var width = $('#timeline .ui-slider-handle').width();
        var year = $('#timeline').slider('value');
        var info = '';
        $('#timeline-info').css('display', '').css('top', pos.top).css('left', pos.left + width);
        $('#timeline-info .year').html(year);
        for (i=0;i<knownPhysicists.length;i++) {
            if (knownPhysicists[i].birth_year <= year && year <= knownPhysicists[i].death_year) {
                info += '<p>' + knownPhysicists[i].name
                info += ' (' + knownPhysicists[i].birth_year;
                if (knownPhysicists[i].death_year < 9999) {
                    info += ' - ';
                    info += knownPhysicists[i].death_year;
                }
                info += ')</p>';
            }
        }
        if (info == '') {
            info = '<p>Žiadny fyzici v tomto roku.</p>';
        }
        $('#timeline-info .physicists').html(info);
    }
    
    /**
     * Creates slider and all its handlers.
     */
    insertTimeline = function() {
        $('#timeline').slider({
            orientation: "vertical",
            range: false,
            min: <?php echo '/*%%SmartyNocache:2922450a26e19407b59-73318580%%*/<?php echo $_smarty_tpl->tpl_vars[\'start_year\']->value;?>
/*/%%SmartyNocache:2922450a26e19407b59-73318580%%*/';?>
,
            max: <?php echo '/*%%SmartyNocache:2922450a26e19407b59-73318580%%*/<?php echo $_smarty_tpl->tpl_vars[\'end_year\']->value;?>
/*/%%SmartyNocache:2922450a26e19407b59-73318580%%*/';?>
,
            stop: sliderOnStop,
            slide: updateHandleInfo
        }).after('<div id="timeline-info" style="display: none; position: absolute; width: 200px; min-height: 200px; border: 1px solid black; background-color: white; z-index: 1000;"><p>Rok: <span class="year"></span></p><div class="physicists"></div></div>').mouseover(updateHandleInfo).mouseout(function(){
            $('#timeline-info').css('display', 'none');
        });
        
        var url = '<?php echo smartyCreateUri(array('controller'=>"timeline",'action'=>"ajaxTimelineInfoData"),$_smarty_tpl);?>
';
        $.ajax(url, {
            cache: true,
            dataType: 'json',
            success: function(data) {
                knownPhysicists = data;
            }
        });
    }
    
    insertTimeline();
    
});<?php }} ?>