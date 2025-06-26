<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('My Profile') }}
            </h2>
            <a href="{{ route('profile.edit') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                <i class="bi bi-gear me-2"></i>
                {{ __('Edit Profile') }}
            </a>
        </div>
    </x-slot>

    <!-- Profile Header Section -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Profile Hero Card -->
            <div class="bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700 rounded-2xl shadow-2xl p-8 mb-8 text-white">
                <div class="flex flex-col md:flex-row items-center md:items-start space-y-6 md:space-y-0 md:space-x-8">
                    <!-- Profile Avatar -->
                    <div class="relative">
                        <div class="w-32 h-32 bg-white/20 rounded-full flex items-center justify-center text-4xl font-bold backdrop-blur-sm border-4 border-white/30">
                            {{ strtoupper(substr($user->name, 0, 2)) }}
                        </div>
                        <div class="absolute -bottom-2 -right-2 w-8 h-8 bg-green-500 rounded-full border-4 border-white flex items-center justify-center">
                            <i class="bi bi-check text-white text-xs"></i>
                        </div>
                    </div>

                    <!-- Profile Info -->
                    <div class="flex-1 text-center md:text-left">
                        <h1 class="text-3xl md:text-4xl font-bold mb-2">{{ $user->name }}</h1>
                        <p class="text-blue-100 text-lg mb-4">{{ $user->email }}</p>
                        
                        <div class="flex flex-wrap justify-center md:justify-start gap-4 mb-6">
                            <div class="flex items-center space-x-2 bg-white/10 px-4 py-2 rounded-full backdrop-blur-sm">
                                <i class="bi bi-shield-check text-green-300"></i>
                                <span class="capitalize font-medium">{{ $user->role ?? 'user' }}</span>
                            </div>
                            <div class="flex items-center space-x-2 bg-white/10 px-4 py-2 rounded-full backdrop-blur-sm">
                                <i class="bi bi-calendar-plus text-blue-300"></i>
                                <span>Joined {{ $user->created_at->format('M Y') }}</span>
                            </div>
                        </div>
                        
                        <!-- Quick Stats -->
                        <div class="grid grid-cols-3 gap-4 text-center">
                            <div class="bg-white/10 rounded-lg p-4 backdrop-blur-sm">
                                <div class="text-2xl font-bold">{{ $user->form_stats['total'] ?? 0 }}</div>
                                <div class="text-blue-100 text-sm">Total Forms</div>
                            </div>
                            <div class="bg-white/10 rounded-lg p-4 backdrop-blur-sm">
                                <div class="text-2xl font-bold text-yellow-300">{{ $user->pending_forms ?? 0 }}</div>
                                <div class="text-blue-100 text-sm">Pending</div>
                            </div>
                            <div class="bg-white/10 rounded-lg p-4 backdrop-blur-sm">
                                <div class="text-2xl font-bold text-green-300">{{ $user->approved_forms ?? 0 }}</div>
                                <div class="text-blue-100 text-sm">Approved</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Column - Statistics & Info -->
                <div class="lg:col-span-1 space-y-6">
                    <!-- Form Statistics Card -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                        <div class="px-6 py-4 bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-gray-800 dark:to-gray-700 border-b border-gray-200 dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                                <i class="bi bi-bar-chart-fill text-blue-600 mr-2"></i>
                                Form Statistics
                            </h3>
                        </div>
                        <div class="p-6 space-y-4">
                            <!-- Attendance -->
                            <div class="flex items-center justify-between p-3 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-blue-100 dark:bg-blue-800 rounded-lg flex items-center justify-center">
                                        <i class="bi bi-calendar-check text-blue-600 dark:text-blue-300"></i>
                                    </div>
                                    <span class="font-medium text-gray-900 dark:text-white">Attendance</span>
                                </div>
                                <span class="text-lg font-bold text-blue-600 dark:text-blue-300">{{ $user->form_stats['attendance'] ?? 0 }}</span>
                            </div>

                            <!-- Itinerary -->
                            <div class="flex items-center justify-between p-3 bg-green-50 dark:bg-green-900/20 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-green-100 dark:bg-green-800 rounded-lg flex items-center justify-center">
                                        <i class="bi bi-geo-alt text-green-600 dark:text-green-300"></i>
                                    </div>
                                    <span class="font-medium text-gray-900 dark:text-white">Itinerary</span>
                                </div>
                                <span class="text-lg font-bold text-green-600 dark:text-green-300">{{ $user->form_stats['itineraries'] ?? 0 }}</span>
                            </div>

                            <!-- Reimbursement -->
                            <div class="flex items-center justify-between p-3 bg-yellow-50 dark:bg-yellow-900/20 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-yellow-100 dark:bg-yellow-800 rounded-lg flex items-center justify-center">
                                        <i class="bi bi-cash-coin text-yellow-600 dark:text-yellow-300"></i>
                                    </div>
                                    <span class="font-medium text-gray-900 dark:text-white">Reimbursement</span>
                                </div>
                                <span class="text-lg font-bold text-yellow-600 dark:text-yellow-300">{{ $user->form_stats['reimbursements'] ?? 0 }}</span>
                            </div>

                            <!-- Gate Pass -->
                            <div class="flex items-center justify-between p-3 bg-cyan-50 dark:bg-cyan-900/20 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-cyan-100 dark:bg-cyan-800 rounded-lg flex items-center justify-center">
                                        <i class="bi bi-door-open text-cyan-600 dark:text-cyan-300"></i>
                                    </div>
                                    <span class="font-medium text-gray-900 dark:text-white">Gate Pass</span>
                                </div>
                                <span class="text-lg font-bold text-cyan-600 dark:text-cyan-300">{{ $user->form_stats['gate_passes'] ?? 0 }}</span>
                            </div>

                            <!-- Excuse -->
                            <div class="flex items-center justify-between p-3 bg-red-50 dark:bg-red-900/20 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-red-100 dark:bg-red-800 rounded-lg flex items-center justify-center">
                                        <i class="bi bi-person-x text-red-600 dark:text-red-300"></i>
                                    </div>
                                    <span class="font-medium text-gray-900 dark:text-white">Excuse Letters</span>
                                </div>
                                <span class="text-lg font-bold text-red-600 dark:text-red-300">{{ $user->form_stats['excuses'] ?? 0 }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Account Information Card -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                        <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-slate-50 dark:from-gray-800 dark:to-gray-700 border-b border-gray-200 dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                                <i class="bi bi-info-circle-fill text-gray-600 mr-2"></i>
                                Account Information
                            </h3>
                        </div>
                        <div class="p-6 space-y-4">
                            <div class="flex items-center justify-between py-2 border-b border-gray-100 dark:border-gray-700">
                                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Full Name</span>
                                <span class="text-sm text-gray-900 dark:text-white">{{ $user->name }}</span>
                            </div>
                            <div class="flex items-center justify-between py-2 border-b border-gray-100 dark:border-gray-700">
                                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Email Address</span>
                                <span class="text-sm text-gray-900 dark:text-white">{{ $user->email }}</span>
                            </div>
                            <div class="flex items-center justify-between py-2 border-b border-gray-100 dark:border-gray-700">
                                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Account Type</span>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ ($user->role ?? 'user') === 'admin' ? 'bg-purple-100 text-purple-800 dark:bg-purple-900/20 dark:text-purple-300' : 'bg-blue-100 text-blue-800 dark:bg-blue-900/20 dark:text-blue-300' }}">
                                    {{ ucfirst($user->role ?? 'user') }}
                                </span>
                            </div>
                            <div class="flex items-center justify-between py-2 border-b border-gray-100 dark:border-gray-700">
                                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Member Since</span>
                                <span class="text-sm text-gray-900 dark:text-white">{{ $user->created_at->format('F j, Y') }}</span>
                            </div>
                            <div class="flex items-center justify-between py-2">
                                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Email Verified</span>
                                <span class="inline-flex items-center">
                                    @if($user->email_verified_at)
                                        <i class="bi bi-check-circle-fill text-green-500 mr-1"></i>
                                        <span class="text-sm text-green-600 dark:text-green-400">Verified</span>
                                    @else
                                        <i class="bi bi-x-circle-fill text-red-500 mr-1"></i>
                                        <span class="text-sm text-red-600 dark:text-red-400">Not Verified</span>
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Recent Activity -->
                <div class="lg:col-span-2">
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                        <div class="px-6 py-4 bg-gradient-to-r from-indigo-50 to-purple-50 dark:from-gray-800 dark:to-gray-700 border-b border-gray-200 dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                                <i class="bi bi-clock-history text-indigo-600 mr-2"></i>
                                Recent Activity
                            </h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Your latest form submissions and updates</p>
                        </div>
                        <div class="p-6">
                            @if($recentActivity->count() > 0)
                                <div class="space-y-4">
                                    @foreach($recentActivity as $activity)
                                        <div class="flex items-start space-x-4 p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg hover:shadow-md transition-shadow duration-200">
                                            <div class="flex-shrink-0">
                                                @php
                                                    $colorClass = match($activity['color']) {
                                                        'blue' => 'bg-blue-100 dark:bg-blue-900/20',
                                                        'green' => 'bg-green-100 dark:bg-green-900/20',
                                                        'yellow' => 'bg-yellow-100 dark:bg-yellow-900/20',
                                                        'cyan' => 'bg-cyan-100 dark:bg-cyan-900/20',
                                                        'red' => 'bg-red-100 dark:bg-red-900/20',
                                                        default => 'bg-gray-100 dark:bg-gray-900/20'
                                                    };
                                                    $iconColorClass = match($activity['color']) {
                                                        'blue' => 'text-blue-600 dark:text-blue-300',
                                                        'green' => 'text-green-600 dark:text-green-300',
                                                        'yellow' => 'text-yellow-600 dark:text-yellow-300',
                                                        'cyan' => 'text-cyan-600 dark:text-cyan-300',
                                                        'red' => 'text-red-600 dark:text-red-300',
                                                        default => 'text-gray-600 dark:text-gray-300'
                                                    };
                                                @endphp
                                                <div class="w-10 h-10 {{ $colorClass }} rounded-lg flex items-center justify-center">
                                                    <i class="{{ $activity['icon'] }} {{ $iconColorClass }}"></i>
                                                </div>
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <div class="flex items-center justify-between">
                                                    <p class="text-sm font-medium text-gray-900 dark:text-white">
                                                        {{ $activity['type'] }} Form
                                                    </p>
                                                    <div class="flex items-center space-x-2">
                                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                                            {{ $activity['status'] === 'approved' ? 'bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-300' : 
                                                               ($activity['status'] === 'pending' ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/20 dark:text-yellow-300' : 
                                                                'bg-red-100 text-red-800 dark:bg-red-900/20 dark:text-red-300') }}">
                                                            @if($activity['status'] === 'approved')
                                                                <i class="bi bi-check-circle-fill mr-1"></i>
                                                            @elseif($activity['status'] === 'pending')
                                                                <i class="bi bi-clock-fill mr-1"></i>
                                                            @else
                                                                <i class="bi bi-x-circle-fill mr-1"></i>
                                                            @endif
                                                            {{ ucfirst($activity['status']) }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="mt-1 flex items-center justify-between">
                                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                                        @if(isset($activity['details']))
                                                            {{ $activity['details'] }} • 
                                                        @endif
                                                        {{ \Carbon\Carbon::parse($activity['date'])->format('M j, Y') }}
                                                    </p>
                                                    <span class="text-xs text-gray-500 dark:text-gray-400">
                                                        {{ \Carbon\Carbon::parse($activity['date'])->diffForHumans() }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-12">
                                    <div class="w-16 h-16 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-4">
                                        <i class="bi bi-inbox text-2xl text-gray-400"></i>
                                    </div>
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">No Recent Activity</h3>
                                    <p class="text-gray-600 dark:text-gray-400 mb-6">You haven't submitted any forms yet.</p>
                                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        <i class="bi bi-plus-circle mr-2"></i>
                                        Create Your First Form
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="mt-8">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                        <i class="bi bi-lightning-charge-fill text-yellow-500 mr-2"></i>
                        Quick Actions
                    </h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
                        <a href="{{ route('dashboard') }}" class="flex flex-col items-center p-4 bg-blue-50 dark:bg-blue-900/20 hover:bg-blue-100 dark:hover:bg-blue-900/30 rounded-lg transition-colors duration-200 group">
                            <div class="w-12 h-12 bg-blue-100 dark:bg-blue-800 rounded-lg flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                                <i class="bi bi-speedometer2 text-blue-600 dark:text-blue-300"></i>
                            </div>
                            <span class="text-sm font-medium text-gray-900 dark:text-white text-center">Dashboard</span>
                        </a>
                        
                        <a href="{{ route('profile.edit') }}" class="flex flex-col items-center p-4 bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 rounded-lg transition-colors duration-200 group">
                            <div class="w-12 h-12 bg-gray-100 dark:bg-gray-600 rounded-lg flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                                <i class="bi bi-gear text-gray-600 dark:text-gray-300"></i>
                            </div>
                            <span class="text-sm font-medium text-gray-900 dark:text-white text-center">Settings</span>
                        </a>

                        <button class="flex flex-col items-center p-4 bg-green-50 dark:bg-green-900/20 hover:bg-green-100 dark:hover:bg-green-900/30 rounded-lg transition-colors duration-200 group">
                            <div class="w-12 h-12 bg-green-100 dark:bg-green-800 rounded-lg flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                                <i class="bi bi-geo-alt text-green-600 dark:text-green-300"></i>
                            </div>
                            <span class="text-sm font-medium text-gray-900 dark:text-white text-center">Itinerary</span>
                        </button>

                        <button class="flex flex-col items-center p-4 bg-yellow-50 dark:bg-yellow-900/20 hover:bg-yellow-100 dark:hover:bg-yellow-900/30 rounded-lg transition-colors duration-200 group">
                            <div class="w-12 h-12 bg-yellow-100 dark:bg-yellow-800 rounded-lg flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                                <i class="bi bi-cash-coin text-yellow-600 dark:text-yellow-300"></i>
                            </div>
                            <span class="text-sm font-medium text-gray-900 dark:text-white text-center">Reimbursement</span>
                        </button>

                        <button class="flex flex-col items-center p-4 bg-cyan-50 dark:bg-cyan-900/20 hover:bg-cyan-100 dark:hover:bg-cyan-900/30 rounded-lg transition-colors duration-200 group">
                            <div class="w-12 h-12 bg-cyan-100 dark:bg-cyan-800 rounded-lg flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                                <i class="bi bi-door-open text-cyan-600 dark:text-cyan-300"></i>
                            </div>
                            <span class="text-sm font-medium text-gray-900 dark:text-white text-center">Gate Pass</span>
                        </button>

                        <button class="flex flex-col items-center p-4 bg-red-50 dark:bg-red-900/20 hover:bg-red-100 dark:hover:bg-red-900/30 rounded-lg transition-colors duration-200 group">
                            <div class="w-12 h-12 bg-red-100 dark:bg-red-800 rounded-lg flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                                <i class="bi bi-person-x text-red-600 dark:text-red-300"></i>
                            </div>
                            <span class="text-sm font-medium text-gray-900 dark:text-white text-center">Excuse Letter</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
