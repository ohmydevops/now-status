@props([
  'disabled' => false,
  'rows' => '50',
  'placeholder' => 'Write your first status here !',
  'text' => ''
])

<textarea placeholder="{{ $placeholder }}" rows="{{ $rows }}" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>{{ $text }}</textarea>