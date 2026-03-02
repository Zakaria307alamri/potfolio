@extends('backend.layouts.app')

@section('title', 'روابط التواصل')

@section('admin-content')
    <div dir="rtl" class="p-4 sm:p-6 lg:p-8 text-right">
        <div class="sm:flex sm:items-center sm:justify-between mb-8">
            <div>
                <h2 class="text-2xl font-bold leading-7 text-gray-900 dark:text-white sm:truncate sm:text-3xl sm:tracking-tight">
                    روابط التواصل
                </h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    إدارة روابط حساباتك الاجتماعية.
                </p>
            </div>
            <div class="mt-4 sm:mt-0">
                @can('portfolio.create')
                    <a href="{{ route('admin.portfolio.social-links.create') }}" class="btn-primary">
                        إضافة رابط
                    </a>
                @endcan
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
            <div class="p-6">
                @if($socialLinks->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        المنصة
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        الرابط
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        الأيقونة
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        الترتيب
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        الإجراءات
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($socialLinks as $socialLink)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                            {{ $platforms[$socialLink->platform] ?? $socialLink->platform }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                            <a href="{{ $socialLink->url }}" target="_blank" class="text-blue-600 dark:text-blue-400 hover:underline">
                                                {{ Str::limit($socialLink->url, 30) }}
                                            </a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                            @if($socialLink->icon)
                                                <img src="{{ $socialLink->icon_url }}" alt="{{ $socialLink->platform }}" class="w-6 h-6 object-contain">
                                            @else
                                                <span class="text-gray-400 dark:text-gray-500">افتراضي</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                            {{ $socialLink->order }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <div class="flex justify-end space-x-2">
                                                @can('portfolio.edit')
                                                    <a href="{{ route('admin.portfolio.social-links.edit', $socialLink) }}" class="text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-300">
                                                        تعديل
                                                    </a>
                                                @endcan
                                                @can('portfolio.delete')
                                                    <form action="{{ route('admin.portfolio.social-links.destroy', $socialLink) }}" method="POST" class="inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300" onclick="return confirm('هل أنت متأكد من حذف هذا الرابط؟')">
                                                            حذف
                                                        </button>
                                                    </form>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-8">
                        <svg class="mx-auto h-12 w-12 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                        </svg>
                        <h3 class="mt-2 text-lg font-medium text-gray-900 dark:text-white">لا توجد روابط</h3>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">ابدأ بإضافة أول رابط.</p>
                        <div class="mt-6">
                            @can('portfolio.create')
                                <a href="{{ route('admin.portfolio.social-links.create') }}" class="btn-primary">
                                    إضافة رابط
                                </a>
                            @endcan
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection





