@extends('backend.layouts.app')

@section('title', 'إضافة خبرة')

@section('admin-content')
    <div dir="rtl" class="p-4 sm:p-6 lg:p-8 text-right">
        <div class="sm:flex sm:items-center sm:justify-between mb-8">
            <div>
                <h2 class="text-2xl font-bold leading-7 text-gray-900 dark:text-white sm:truncate sm:text-3xl sm:tracking-tight">
                    إضافة خبرة
                </h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    إضافة خبرة عمل جديدة.
                </p>
            </div>
            <div class="mt-4 sm:mt-0">
                <a href="{{ route('admin.portfolio.experiences.index') }}" class="btn-default">
                    إلغاء
                </a>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
            <form action="{{ route('admin.portfolio.experiences.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="company_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">اسم الشركة <span class="text-red-500">*</span></label>
                        <input type="text" name="company_name" id="company_name" value="{{ old('company_name') }}" class="form-control" required>
                        @error('company_name')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="role" class="block text-sm font-medium text-gray-700 dark:text-gray-300">الوظيفة/المنصب <span class="text-red-500">*</span></label>
                        <input type="text" name="role" id="role" value="{{ old('role') }}" class="form-control" required>
                        @error('role')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="start_year" class="block text-sm font-medium text-gray-700 dark:text-gray-300">سنة البداية <span class="text-red-500">*</span></label>
                        <input type="text" name="start_year" id="start_year" value="{{ old('start_year') }}" class="form-control" required placeholder="2020">
                        @error('start_year')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div x-data="{ current: {{ old('current') ? 'true' : 'false' }} }">
                        <div class="flex items-center mb-2">
                            <input type="checkbox" name="current" id="current" value="1" x-model="current" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="current" class="ml-2 block text-sm text-gray-700 dark:text-gray-300">أعمل هنا حاليًا</label>
                        </div>

                        <div x-show="current === false">
                            <label for="end_year" class="block text-sm font-medium text-gray-700 dark:text-gray-300">سنة النهاية</label>
                            <input type="text" name="end_year" id="end_year" value="{{ old('end_year') }}" class="form-control" placeholder="2023">
                            @error('end_year')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="company_website" class="block text-sm font-medium text-gray-700 dark:text-gray-300">موقع الشركة</label>
                        <input type="url" name="company_website" id="company_website" value="{{ old('company_website') }}" class="form-control" placeholder="https://example.com">
                        @error('company_website')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="company_logo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">شعار الشركة</label>
                        <input type="file" name="company_logo" id="company_logo" class="form-control" accept="image/*">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">ارفع شعار الشركة (اختياري).</p>
                        @error('company_logo')
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

                    <div class="md:col-span-2">
                        <label for="summary" class="block text-sm font-medium text-gray-700 dark:text-gray-300">ملخص العمل</label>
                        <textarea name="summary" id="summary" rows="4" class="form-control">{{ old('summary') }}</textarea>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">صف مسؤولياتك وإنجازاتك في هذا الدور.</p>
                        @error('summary')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <button type="submit" class="btn-primary">
                        حفظ الخبرة
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection






