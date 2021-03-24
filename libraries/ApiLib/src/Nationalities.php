<?php
namespace QControl\Site;

class Nationalities
{

    function getNationalities()
    {
        # Initialize Curl call
        $curl_init = curl_init("https://qcontroldev.mk2softwaredev.nl/api/services/app/Driver/GetNationalities");

        # Set up the Curl request
        curl_setopt($curl_init, CURLOPT_HEADER, 0);

        # Return response as array instead of Object
        curl_setopt($curl_init, CURLOPT_HTTP_CONTENT_DECODING, false);
        curl_setopt($curl_init, CURLOPT_RETURNTRANSFER, true);

        #Store response in $response
        $response = curl_exec($curl_init);

        #Close Curl response
        curl_close($curl_init);

        # Decode array response
        $decoded = json_decode($response, true);

        # Return json_decoded variable
        return $decoded;
    }
}