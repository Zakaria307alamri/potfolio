@extends('backend.layouts.app')

@section('title', 'إضافة مشروع')

@section('admin-content')
    <div dir="rtl" class="p-4 sm:p-6 lg:p-8 text-right">
        <div class="sm:flex sm:items-center sm:justify-between mb-8">
            <div>
                <h2 class="text-2xl font-bold leading-7 text-gray-900 dark:text-white sm:truncate sm:text-3xl sm:tracking-tight">
                    إضافة مشروع
                </h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    إضافة مشروع جديد إلى ملف الأعمال.
                </p>
            </div>
            <div class="mt-4 sm:mt-0">
                <a href="{{ route('admin.portfolio.projects.index') }}" class="btn-default">
                    إلغاء
                </a>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
            <form action="{{ route('admin.portfolio.projects.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">الاسم <span class="text-red-500">*</span></label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" required>
                        @error('name')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="slug" class="block text-sm font-medium text-gray-700 dark:text-gray-300">الرابط المختصر</label>
                        <input type="text" name="slug" id="slug" value="{{ old('slug') }}" class="form-control">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">اتركه فارغًا ليتم توليده تلقائيًا من الاسم.</p>
                        @error('slug')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label for="summary" class="block text-sm font-medium text-gray-700 dark:text-gray-300">الملخص</label>
                        <textarea name="summary" id="summary" rows="2" class="form-control">{{ old('summary') }}</textarea>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">وصف مختصر للمشروع.</p>
                        @error('summary')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">الوصف</label>
                        <textarea name="description" id="description" rows="6" class="form-control">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">صورة المشروع</label>
                        <input type="file" name="image" id="image" class="form-control" accept="image/*">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">ارفع صورة تمثل المشروع.</p>
                        @error('image')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="github_link" class="block text-sm font-medium text-gray-700 dark:text-gray-300">مرجع التصميم</label>
                        <input type="url" name="github_link" id="github_link" value="{{ old('github_link') }}" class="form-control" placeholder="https://github.com/username/project">
                        @error('github_link')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="demo_link" class="block text-sm font-medium text-gray-700 dark:text-gray-300">رابط العرض</label>
                        <input type="url" name="demo_link" id="demo_link" value="{{ old('demo_link') }}" class="form-control" placeholder="https://example.com">
                        @error('demo_link')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="order" class="block text-sm font-medium text-gray-700 dark:text-gray-300">ترتيب العرض</label>
                        <input type="number" name="order" id="order" value="{{ old('order', 0) }}" class="form-control" min="0">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">الأرقام الأصغر تظهر أولًا.</p>
                        @error('order')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <div class="flex items-center">
                            <input type="checkbox" name="featured" id="featured" value="1" {{ old('featured') ? 'checked' : '' }} class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="featured" class="ml-2 block text-sm text-gray-700 dark:text-gray-300">مشروع مميز</label>
                        </div>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">المشاريع المميزة تظهر في الصفحة الرئيسية.</p>
                        @error('featured')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <button type="submit" class="btn-primary">
                        حفظ المشروع
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection






