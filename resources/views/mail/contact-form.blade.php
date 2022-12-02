<x-mail::message>
# Пользователь оставил следующие данные:

**Имя:** {{ $formData['name'] }}

**Телефон:** {{ $formData['phone'] }}

**Email:** {{ $formData['email'] }}

**Сообщение:** {{ $formData['message'] }}
</x-mail::message>
