@extends('backend.layouts.app')

@section('title', 'إضافة مهارة')

@section('admin-content')
    <div dir="rtl" class="p-4 sm:p-6 lg:p-8 text-right">
        <div class="sm:flex sm:items-center sm:justify-between mb-8">
            <div>
                <h2 class="text-2xl font-bold leading-7 text-gray-900 dark:text-white sm:truncate sm:text-3xl sm:tracking-tight">
                    إضافة مهارة
                </h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    إضافة مهارة جديدة إلى ملف الأعمال.
                </p>
            </div>
            <div class="mt-4 sm:mt-0">
                <a href="{{ route('admin.portfolio.skills.index') }}" class="btn-default">
                    إلغاء
                </a>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
            <form action="{{ route('admin.portfolio.skills.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
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
                        <label for="percentage" class="block text-sm font-medium text-gray-700 dark:text-gray-300">النسبة</label>
                        <div class="flex items-center">
                            <input type="range" name="percentage" id="percentage" min="0" max="100" value="{{ old('percentage', 75) }}" class="w-full h-2 bg-gray-200 dark:bg-gray-700 rounded-lg appearance-none cursor-pointer" oninput="updatePercentageValue(this.value)">
                            <span id="percentageValue" class="ml-2 text-sm text-gray-700 dark:text-gray-300">75%</span>
                        </div>
                        @error('percentage')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="icon" class="block text-sm font-medium text-gray-700 dark:text-gray-300">الأيقونة</label>
                        <input type="file" name="icon" id="icon" class="form-control" accept="image/*">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">ارفع أيقونة صغيرة تمثل المهارة (SVG, PNG, JPG).</p>
                        @error('icon')
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
                </div>

                <div class="mt-6 flex justify-end">
                    <button type="submit" class="btn-primary">
                        حفظ المهارة
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function updatePercentageValue(value) {
            document.getElementById('percentageValue').textContent = value + '%';
        }

        // Initialize the percentage value
        document.addEventListener('DOMContentLoaded', function() {
            updatePercentageValue(document.getElementById('percentage').value);
        });
    </script>
@endsection







