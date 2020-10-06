<?php

namespace Core\Util;

class SuccessManager
{

    /**
     * @return array
     */
    public static function getMessages(): array
    {
        return isset($_SESSION['success']) ? $_SESSION['success'] : [];
    }

    /**
     * @param string $message
     * @return void
     */
    public static function add(string $message): void
    {
        if (!isset($_SESSION['success'])) {
            $_SESSION['success'] = [];
        }
        $_SESSION['success'][] = $message;
    }

    /**
     * Détruit le tableau de messages
     * @return void
     */
    public static function destroy(): void
    {
        unset($_SESSION['success']);
    }

}