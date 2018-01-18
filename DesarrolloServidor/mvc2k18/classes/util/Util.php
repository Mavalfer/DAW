<?php

class Util {

    static function encriptar($cadena, $coste = 10) {
        $opciones = array(
            'cost' => $coste
        );
        return password_hash($cadena, PASSWORD_DEFAULT, $opciones);
    }

    static function enviarCorreo ($destino, $asunto, $mensaje) {
        require_once 'classes/vendor/autoload.php';
        $cliente = new Google_Client();
        $cliente->setApplicationName(Constants::APPNAME);
        $cliente->setClientId(Constants::CLIENTID);
        $cliente->setClientSecret(Constants::CLIENTSECRET);
        $cliente->setAccessType('offline');
        $cliente->setAccessToken(file_get_contents(Constants::TOKEN));
        if ($cliente->getAccessToken()) {
            $service = new Google_Service_Gmail($cliente);
            try {
                $mail = new PHPMailer\PHPMailer\PHPMailer();
                $mail->CharSet = "UTF-8";
                $mail->From = Constants::CORREO;
                $mail->FromName = Constants::ALIAS;
                $mail->AddAddress($destino);
                $mail->AddReplyTo(Constants::CORREO, Constants::ALIAS);
                $mail->Subject = $asunto;
                $mail->Body = $mensaje;
                $mail->IsHTML(true);
                $mail->preSend();
                $mime = $mail->getSentMIMEMessage();
                $mime = rtrim(strtr(base64_encode($mime), '+/', '-_'), '=');
                $mensaje = new Google_Service_Gmail_Message();
                $mensaje->setRaw($mime);
                $service->users_messages->send('me', $mensaje);
                return true;
            } catch (Exception $e) {
                return false;
            }
        } else {
            return false;
        }
    }

    static function renderHtmlSelect(array $array, $name, $valor = null) {
        $html = '<select name="' . $name . '">';
        foreach ($array as $key => $value) {
            $selected = '';
            if ($valor == $key) {
                $selected = 'selected="selected"';
            }
            $html .= '<option ' . $selected . 'value=' . $key . '>' . $value . '</option>';
        }
        $html .= '</select>';
        return $html;
    }

    static function renderSelectEstadoCivil($name, $valor = null){
        $array = array(
            "" => "",
            1 => 'soltero',
            2 => 'casado',
            3 => 'divorciado',
            4 => 'viudo',
            5 => 'de hecho',
            6 => 'otro'
        );
        return self::renderHtmlSelect($array, $name, $valor);
    }

    static function renderTemplate($template, array $data = array()) {
        if (!file_exists($template)) {
            return '';
        }
        $content = file_get_contents($template);
        return self::renderText($content, $data);
    }

    static function renderText($text, array $data = array()) {
        foreach ($data as $indice => $dato) {
            $text = str_replace('{{' . $indice . '}}', $dato, $text);
        }
        //quitar los {{...}} restantes
        $text = preg_replace('/{{[^\s]+}}/', '', $text);
        return $text;
    }

    static function varDump($valor){
        return '<pre>' . var_export($valor, true) . '</pre>';   
    }

    static function verificarClave($claveSinEncriptar, $claveEncriptada) {
        return password_verify($claveSinEncriptar, $claveEncriptada);
    }
}
