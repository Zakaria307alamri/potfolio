@extends('backend.layouts.app')

@section('title', 'تعديل رابط')

@section('admin-content')
    <div dir="rtl" class="p-4 sm:p-6 lg:p-8 text-right">
        <div class="sm:flex sm:items-center sm:justify-between mb-8">
            <div>
                <h2 class="text-2xl font-bold leading-7 text-gray-900 dark:text-white sm:truncate sm:text-3xl sm:tracking-tight">
                    تعديل الرابط
                </h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    تحديث رابط الحساب الاجتماعي.
                </p>
            </div>
            <div class="mt-4 sm:mt-0">
                <a href="{{ route('admin.portfolio.social-links.index') }}" class="btn-default">
                    إلغاء
                </a>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
            <form action="{{ route('admin.portfolio.social-links.update', $socialLink) }}" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="platform" class="block text-sm font-medium text-gray-700 dark:text-gray-300">المنصة <span class="text-red-500">*</span></label>
                        <select name="platform" id="platform" class="form-control" required>
                            <option value="">اختر المنصة</option>
                            @foreach($platforms as $key => $value)
                                <option value="{{ $key }}" {{ old('platform', $socialLink->platform) == $key ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                        @error('platform')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="url" class="block text-sm font-medium text-gray-700 dark:text-gray-300">الرابط <span class="text-red-500">*</span></label>
                        <input type="url" name="url" id="url" value="{{ old('url', $socialLink->url) }}" class="form-control" required placeholder="https://example.com/username">
                        @error('url')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="icon" class="block text-sm font-medium text-gray-700 dark:text-gray-300">أيقونة مخصصة</label>
                        <input type="file" name="icon" id="icon" class="form-control" accept="image/*">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">ارفع أيقونة مخصصة لهذه المنصة (اختياري).</p>
                        @error('icon')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                        @if($socialLink->icon)
                            <div class="mt-2">
                                <img src="{{ $socialLink->icon_url }}" alt="{{ $socialLink->platform }}" class="w-8 h-8 object-contain">
                            </div>
                        @endif
                    </div>

                    <div>
                        <label for="order" class="block text-sm font-medium text-gray-700 dark:text-gray-300">ترتيب العرض</label>
                        <input type="number" name="order" id="order" value="{{ old('order', $socialLink->order) }}" class="form-control" min="0">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">الأرقام الأصغر تظهر أولًا.</p>
                        @error('order')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <button type="submit" class="btn-primary">
                        تحديث الرابط
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection






