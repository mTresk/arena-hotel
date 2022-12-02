<x-mail::message>
# Пользователь оставил отзыв:

**Имя:** {{ $formData['username'] }}

**Сообщение:** {{ $formData['review'] }}

**Оценка:** {{ $formData['rating'] }}
</x-mail::message>
