<?php

class CurlClient
{
    public static function request($method, $url, $data = null)
    {
        $ch = curl_init();

        // Set URL dan agar hasil tidak langsung tampil di browser
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Kalau bukan GET, berarti ada data yang akan dikirim
        if ($method !== 'GET') {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        }

        // Header untuk JSON
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
            "Accept: application/json"
        ]);

        // Eksekusi dan ambil respons
        $response = curl_exec($ch);

        // Kalau cURL error (gagal koneksi)
        if (curl_errno($ch)) {
            return [
                "status" => "error",
                "message" => curl_error($ch)
            ];
        }

        curl_close($ch);

        // Decode JSON ke array agar lebih mudah diolah
        return json_decode($response, true);
    }
}
