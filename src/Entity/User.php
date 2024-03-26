<?php

// src/Entity/User.php

namespace App\Entity;

use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
{
    private $username;
    private $password;

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRoles(): array
    {
        // Вернуть роли пользователя, например ['ROLE_USER']
        return ['ROLE_USER'];
    }

    public function eraseCredentials(): void
    {
        // Метод для очистки конфиденциальных данных, необходимых при аутентификации (например, пароля)
        // В вашем случае, если не нужно делать никаких дополнительных действий, оставьте этот метод пустым
    }

    public function getUserIdentifier(): string
    {
        // Вернуть уникальный идентификатор пользователя
        // Например, email или уникальный идентификатор в вашей системе
        return $this->getUsername();
    }

    // Другие методы класса User, если они есть
}
