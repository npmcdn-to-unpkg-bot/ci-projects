<?php if (isset($slider)) { require(APPPATH.$slider_themes[0]->file_path); } ?><?php if (isset($banner)) { require(APPPATH.$banner_themes[0]->file_path); } ?><?php foreach ($showcase as $showcase_key => $showcase_value) { include(APPPATH.$showcase_value->file_path); } ?>