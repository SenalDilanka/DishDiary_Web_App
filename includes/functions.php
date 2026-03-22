<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function redirect(string $url): void
{
    header('Location: ' . $url);
    exit;
}

function e(?string $value): string
{
    return htmlspecialchars(trim((string) $value), ENT_QUOTES, 'UTF-8');
}

function raw_value(?string $value): string
{
    return trim((string) $value);
}

function set_flash(string $type, string $message): void
{
    $_SESSION['flash'] = ['type' => $type, 'message' => $message];
}

function get_flash(): ?array
{
    if (!isset($_SESSION['flash'])) {
        return null;
    }

    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);
    return $flash;
}

function is_logged_in(): bool
{
    return isset($_SESSION['user_id']);
}

function require_login(): void
{
    if (!is_logged_in()) {
        set_flash('warning', 'Please log in to continue.');
        redirect('auth/login.php');
    }
}

function current_user(): ?array
{
    if (!is_logged_in()) {
        return null;
    }

    return [
        'id' => $_SESSION['user_id'],
        'username' => $_SESSION['username'] ?? '',
        'email' => $_SESSION['email'] ?? ''
    ];
}

function nav_active(string $page, string $current): string
{
    return $page === $current ? 'active' : '';
}

function old(string $key, string $default = ''): string
{
    return e($_POST[$key] ?? $default);
}
?>
