<?php

class Cryptography
{
    static function SodiumEncrypt($message, $key)
    {
        $nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
        $encrypted = sodium_crypto_secretbox($message, $nonce, $key);
        $enconded = base64_encode($nonce . $encrypted);
        return $enconded;
    }

    static function SodiumDecrypt($message, $key)
    {
        $decoded = base64_decode($message);
        $nonce = mb_substr($decoded, 0, SODIUM_CRYPTO_SECRETBOX_NONCEBYTES, '8bit');
        $ciphertxt = mb_substr($decoded, SODIUM_CRYPTO_SECRETBOX_NONCEBYTES, null, '8bit');
        return sodium_crypto_secretbox_open($ciphertxt, $nonce, $key);
    }

    static function PasswordHash($password)
    {
        $hashed = sodium_crypto_pwhash_str(
            $password,
            SODIUM_CRYPTO_PWHASH_OPSLIMIT_SENSITIVE,
            SODIUM_CRYPTO_PWHASH_MEMLIMIT_SENSITIVE
        );
        return $hashed;
    }

    static function PasswordVerify($password, $hashed)
    {
        $result = sodium_crypto_pwhash_str_verify($hashed, $password);
        return $result;
    }

  
}
    