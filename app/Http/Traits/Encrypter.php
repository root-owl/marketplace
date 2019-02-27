<?php

namespace App\Http\Traits;

use Hash;
use \Illuminate\Encryption\Encrypter as Encrypterr;

trait Encrypter
{
    /**
     * Encrypts the data with Public key
     */
    public static function encrypt(string $data, string $publicKey) : string
    {
        openssl_public_encrypt($data, $encryptedData, $publicKey);
        return $encryptedData;
    }

    /**
     * Decrypt the data with private key
     */
    public static function decrypt(string $data, string $privateKey) : string
    {
        openssl_private_decrypt($data, $decryptedData, $privateKey);
        return $decryptedData;
    }

    /**
     * Create the Agron Hash
     */
    public static function generateHash(string $data)
    {
        $hash = hash_pbkdf2('sha256', $data, env('APP_KEY'), 400000, 32);
        return $hash;
    }

    public static function rutime($ru, $rus, $index) {
        return ($ru["ru_$index.tv_sec"]*1000 + intval($ru["ru_$index.tv_usec"]/1000))
         -  ($rus["ru_$index.tv_sec"]*1000 + intval($rus["ru_$index.tv_usec"]/1000));
    }


    /**
     * Create the Public and Private key
     */
    public static function generateKeys() : array
    {
        // generate the public and private key
        $config = [
            "digest_alg" => "sha512",
            "private_key_bits" => 4096,
            "private_key_type" => OPENSSL_KEYTYPE_RSA,
        ];
        $res = openssl_pkey_new($config);
        // Extract the private key from $res to $privKey
        openssl_pkey_export($res, $privKey);
        // Extract the public key from $res to $pubKey
        $pubKey = openssl_pkey_get_details($res);
        $pubKey = $pubKey["key"];
        return [
            'public_key' => $pubKey,
            'private_key' => $privKey
        ];
    }

    /**
     * Encrypt the String with AES
     */
    public static function encryptString(Encrypterr $encrypter, string $data) : string
    {
        return $encrypter->encrypt($data);
    }

    /**
     * Decrypt the String with AES
     */
    public static function decryptString(Encrypterr $encrypter, string $data) : string
    {
        return $encrypter->decrypt($data);
    }

    /**
     * Generate the Salt
     */
    public static function generateSalt() : string
    {
        return uniqid(mt_rand(), true);
    }
}