<?php


class Converter {
    private $base_url;
    private $api_key;

    public function __construct() {
        $this->base_url = CONVERTER_API_BASE_URL;
        $this->api_key = API_KEY;
    }

    public function get_rate($source_currency, $target_currency) {
        $url = $this->base_url . '?base=' . $source_currency . '&symbols=' . $target_currency;
        $rate_json = file_get_contents($url);
        $rate_array = json_decode($rate_json);
        return $rate_array;
    }

    public function convert($source_currency, $target_currency, $amount) {
        $conversion_rate = (float)$this->get_rate($source_currency, $target_currency)->rates->$target_currency;
        return $amount * $conversion_rate;
    }
}