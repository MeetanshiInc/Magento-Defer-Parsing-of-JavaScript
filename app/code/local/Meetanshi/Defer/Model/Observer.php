<?php

class Meetanshi_Defer_Model_Observer extends Mage_Core_Model_Abstract
{
    public function httpResponseSendBefore($observer)
    {
        $enable_DeferJs = Mage::helper('defer/data')->isEnable();

        if ($enable_DeferJs) {
            $response = $observer->getEvent()->getResponse();
            $html = $response->getBody();
            preg_match_all('#(<script.*?</script>)#is', $html, $matches);
            $js = '';
            foreach ($matches[0] as $value)
                $js .= $value;
            $html = preg_replace('#<script.*?</script>#is', '', $html);
            $html = preg_replace('#</body>#', $js . '</body>', $html);
            $response->setBody($html);
        }
    }
}
