@extends('backend.layouts.app')

@section('title', 'تعديل الملف الشخصي')

@section('admin-content')
    <div dir="rtl" class="p-4 sm:p-6 lg:p-8 text-right">
        <div class="sm:flex sm:items-center sm:justify-between mb-8">
            <div>
                <h2 class="text-2xl font-bold leading-7 text-gray-900 dark:text-white sm:truncate sm:text-3xl sm:tracking-tight">
                    تعديل ملف الأعمال
                </h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    تحديث معلومات ملف الأعمال.
                </p>
            </div>
            <div class="mt-4 sm:mt-0">
                <a href="{{ route('admin.portfolio.profile.index') }}" class="btn-default">
                    إلغاء
                </a>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
            <form action="{{ route('admin.portfolio.profile.update') }}" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">الاسم <span class="text-red-500">*</span></label>
                        <input type="text" name="name" id="name" value="{{ old('name', $profile->name ?? '') }}" class="form-control" required>
                        @error('name')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">البريد الإلكتروني <span class="text-red-500">*</span></label>
                        <input type="email" name="email" id="email" value="{{ old('email', $profile->email ?? '') }}" class="form-control" required>
                        @error('email')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">الهاتف</label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone', $profile->phone ?? '') }}" class="form-control">
                        @error('phone')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="job_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">المسمى الوظيفي</label>
                        <input type="text" name="job_title" id="job_title" value="{{ old('job_title', $profile->job_title ?? '') }}" class="form-control">
                        @error('job_title')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="location" class="block text-sm font-medium text-gray-700 dark:text-gray-300">الموقع</label>
                        <input type="text" name="location" id="location" value="{{ old('location', $profile->location ?? '') }}" class="form-control">
                        @error('location')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label for="bio" class="block text-sm font-medium text-gray-700 dark:text-gray-300">نبذة</label>
                        <textarea name="bio" id="bio" rows="4" class="form-control">{{ old('bio', $profile->bio ?? '') }}</textarea>
                        @error('bio')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="profile_image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">الصورة الشخصية</label>
                        <input type="file" name="profile_image" id="profile_image" class="form-control" accept="image/*">
                        @error('profile_image')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                        @if(isset($profile) && $profile->profile_image)
                            <div class="mt-2">
                                <img src="{{ $profile->profile_image_url }}" alt="{{ $profile->name }}" class="w-24 h-24 object-cover rounded-full">
                            </div>
                        @endif
                    </div>

                    <div>
                        <label for="cv" class="block text-sm font-medium text-gray-700 dark:text-gray-300">السيرة الذاتية (PDF)</label>
                        <input type="file" name="cv" id="cv" class="form-control" accept="application/pdf">
                        @error('cv')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                        @if(isset($profile) && $profile->cv_path)
                            <div class="mt-2">
                                <a href="{{ $profile->cv_url }}" target="_blank" class="text-blue-600 dark:text-blue-400 hover:underline flex items-center">
                                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    السيرة الذاتية الحالية
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <button type="submit" class="btn-primary">
                        حفظ الملف الشخصي
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection





