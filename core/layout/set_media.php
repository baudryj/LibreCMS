<?php
/**
 * LibreCMS - Copyright (C) Diemen Design 2019
 *
 * Administration - Media Settings
 *
 * set_media.php version 2.0.1
 *
 * LICENSE: This source file may be modifired and distributed under the terms of
 * the MIT license that is available through the world-wide-web at the following
 * URI: http://opensource.org/licenses/MIT.  If you did not receive a copy of
 * the MIT License and are unable to obtain it through the web, please
 * check the root folder of the project for a copy.
 *
 * @category   Administration - Settings - Media
 * @package    core/layout/set_media.php
 * @author     Dennis Suitters <dennis@diemen.design>
 * @copyright  2014-2019 Diemen Design
 * @license    http://opensource.org/licenses/MIT  MIT License
 * @version    2.0.1
 * @link       https://github.com/DiemenDesign/LibreCMS
 * @notes      This PHP Script is designed to be executed using PHP 7+
 * @changes    v2.0.1 Change Back Link to Referer
 */?>
<main id="content" class="main">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a class="text-muted" href="<?php echo URL.$settings['system']['admin'].'/content';?>">Content</a></li>
    <li class="breadcrumb-item"><a class="text-muted" href="<?php echo URL.$settings['system']['admin'].'/media';?>">Media</a></li>
    <li class="breadcrumb-item active">Settings</li>
    <li class="breadcrumb-menu">
      <div class="btn-group" role="group" aria-label="Settings">
        <a class="btn btn-ghost-normal info" href="<?php echo$_SERVER['HTTP_REFERER'];?>" data-tooltip="tooltip" data-placement="left" title="Back"><?php svg('libre-gui-back');?></a>
<?php if($help['media_settings_text']!='')echo'<a target="_blank" class="btn btn-ghost-normal info" href="'.$help['media_settings_text'].'" data-tooltip="tooltip" data-placement="left" title="Help" savefrom_lm="false">'.svg2('libre-gui-help').'</a>';
if($help['media_settings_video']!='')echo'<a href="#" class="btn btn-ghost-normal info" data-toggle="modal" data-frame="iframe" data-target="#videoModal" data-video="'.$help['media_settings_video'].'" data-tooltip="tooltip" data-placement="left" title="Watch Video Help" savefrom_lm="false">'.svg2('libre-gui-video').'</a>';?>
      </div>
    </li>
  </ol>
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <h4 class="page-header">Automatic Image Processing</h4>
        <div class="form-group row">
          <label for="options2" class="col-form-label col-8 col-sm-2" data-tooltip="tooltip" title="Enable/Disable automatic image resizing when uploading images.">Image Resizing</label>
          <div class="input-group col-4 col-sm-10">
            <label class="switch switch-label switch-success"><input type="checkbox" id="options2" class="switch-input" data-dbid="1" data-dbt="config" data-dbc="options" data-dbb="2"<?php echo$config['options']{2}==1?' checked':'';?>><span class="switch-slider" data-checked="on" data-unchecked="off"></span></label>
          </div>
        </div>
        <div class="help-block small text-muted text-right">Uploaded images larger than the above size will be resized to their long edge using the entered values.<br>If either value is '0', resizing will be disabled.</div>
        <div class="form-group row">
          <label for="mediaMaxWidth" class="control-label col-sm-2">Max Width</label>
          <div class="input-group col-sm-10">
            <input type="text" id="mediaMaxWidth" class="form-control textinput" value="<?php echo$config['mediaMaxWidth'];?>" data-dbid="1" data-dbt="config" data-dbc="mediaMaxWidth">
            <div class="input-group-append" data-tooltip="tooltip" data-placement="top" title="Save"><button id="savemediaMaxWidth" class="btn btn-secondary save" data-dbid="mediaMaxWidth" data-style="zoom-in"><?php svg('libre-gui-save');?></button></div>
          </div>
        </div>
        <div class="form-group row">
          <label for="mediaMaxHeight" class="col-form-label col-sm-2">Max Height</label>
          <div class="input-group col-sm-10">
            <input type="text" id="mediaMaxHeight" class="form-control textinput" value="<?php echo$config['mediaMaxHeight'];?>" data-dbid="1" data-dbt="config" data-dbc="mediaMaxHeight">
            <div class="input-group-append" data-tooltip="tooltip" data-placement="top" title="Save"><button id="savemediaMaxHeight" class="btn btn-secondary save" data-dbid="mediaMaxHeight" data-style="zoom-in"><?php svg('libre-gui-save');?></button></div>
          </div>
        </div>
        <div class="form-group row">
          <label for="mediaMaxWidthThumb" class="col-form-label col-sm-2">Max Thumb Width</label>
          <div class="input-group col-sm-10">
            <input type="text" id="mediaMaxWidthThumb" class="form-control textinput" value="<?php echo$config['mediaMaxWidthThumb'];?>" data-dbid="1" data-dbt="config" data-dbc="mediaMaxWidthThumb">
            <div class="input-group-append" data-tooltip="tooltip" data-placement="top" title="Save"><button id="savemediaMaxWidthThumb" class="btn btn-secondary save" data-dbid="mediaMaxWidthThumb" data-style="zoom-in"><?php svg('libre-gui-save');?></button></div>
          </div>
        </div>
        <div class="form-group row">
          <label for="mediaMaxHeightThumb" class="col-form-label col-sm-2">Max Thumb Height</label>
          <div class="input-group col-sm-10">
            <input type="text" id="mediaMaxHeightThumb" class="form-control textinput" value="<?php echo$config['mediaMaxHeightThumb'];?>" data-dbid="1" data-dbt="config" data-dbc="mediaMaxHeightThumb">
            <div class="input-group-append" data-tooltip="tooltip" data-placement="top" title="Save"><button id="savemediaMaxHeightThumb" class="btn btn-secondary save" data-dbid="mediaMaxHeightThumb" data-style="zoom-in"><?php svg('libre-gui-save');?></button></div>
          </div>
        </div>
        <div class="form-group row">
          <label for="mediaQuality" class="col-form-label col-sm-2">Image Quality</label>
          <div class="input-group col-sm-10">
            <input type="text" id="mediaQuality" class="form-control textinput" value="<?php echo$config['mediaQuality'];?>" data-dbid="1" data-dbt="config" data-dbc="mediaQuality">
            <div class="input-group-append" data-tooltip="tooltip" data-placement="top" title="Save"><button id="savemediaQuality" class="btn btn-secondary save" data-dbid="mediaQuality" data-style="zoom-in"><?php svg('libre-gui-save');?></button></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
