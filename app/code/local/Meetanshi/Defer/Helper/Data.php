<?php

class Meetanshi_Defer_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function isEnable(){
        return Mage::getStoreConfig('defer/general/deferjs_enable');
    }
}
