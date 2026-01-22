@extends('layouts.seller.seller')

@section('head')
<link rel="stylesheet" href="{{ asset('css/seller/seller-dashboard.css') }}">
@endsection

@section('content')
<div class="dashboard-container">
    <!-- Header -->
    <div class="dashboard-header">
        <div>
            <h1>{{ $greeting }}, {{ Auth::user()->name }}!</h1>
            <p>Berikut adalah ringkasan performa toko Anda hari ini.</p>
        </div>
        <div class="quick-actions">
            <a href="{{ route('seller.products.create') }}" class="btn-action primary">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Produk
            </a>
            <a href="/" target="_blank" class="btn-action secondary">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
                Lihat Toko
            </a>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="stats-grid">
        <!-- Total Revenue -->
        <div class="stat-card revenue">
            <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div class="stat-content">
                <h3>Total Pendapatan</h3>
                <p class="stat-number">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</p>
            </div>
        </div>

        <!-- Total Products -->
        <div class="stat-card products">
            <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
            </div>
            <div class="stat-content">
                <h3>Total Produk</h3>
                <p class="stat-number">{{ $totalProducts }}</p>
            </div>
        </div>

        <!-- Total Buyers -->
        <div class="stat-card buyers">
            <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </div>
            <div class="stat-content">
                <h3>Total Pembeli</h3>
                <p class="stat-number">{{ $totalBuyers }}</p>
            </div>
        </div>

        <!-- Total Transactions -->
        <div class="stat-card transactions">
            <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                </svg>
            </div>
            <div class="stat-content">
                <h3>Total Transaksi</h3>
                <p class="stat-number">{{ $totalTransactions }}</p>
            </div>
        </div>
    </div>

    <!-- Secondary Section: Reviews & Highlights -->
    <div class="dashboard-grid-secondary">
        <!-- Latest Transactions -->
        <div class="dashboard-section table-section">
            <h2>Transaksi Terbaru</h2>
            <div class="table-container">
                <table class="transactions-table">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Pembeli</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($latestTransactions as $transaction)
                        <tr>
                            <td><span class="transaction-code">{{ $transaction->transaction_code }}</span></td>
                            <td>{{ $transaction->buyer_name }}</td>
                            <td class="amount">Rp {{ number_format($transaction->total, 0, ',', '.') }}</td>
                            <td>
                                <span class="status-badge status-{{ $transaction->status }}">
                                    {{ $transaction->status == 'paid' ? 'Lunas' : ($transaction->status == 'unpaid' ? 'Belum Bayar' : ucfirst($transaction->status)) }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="empty-state">Belum ada transaksi</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Latest Reviews -->
        <div class="dashboard-section reviews-section">
            <h2>Ulasan Terbaru</h2>
            <div class="reviews-list">
                @forelse($latestReviews as $review)
                <div class="review-item">
                    <div class="review-header">
                        <span class="reviewer-name">{{ $review->buyer_name }}</span>
                        <div class="stars">
                            @for($i = 1; $i <= 5; $i++)
                                <span class="star {{ $i <= $review->rating ? 'filled' : '' }}">★</span>
                            @endfor
                        </div>
                    </div>
                    <div class="review-meta">
                        <span class="product-name">{{ $review->product_name }}</span>
                        <span class="review-date">{{ \Carbon\Carbon::parse($review->created_at)->diffForHumans() }}</span>
                    </div>
                    <p class="review-text">"{{ $review->review }}"</p>
                </div>
                @empty
                <div class="empty-state-reviews">
                    <p>Belum ada ulasan produk</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
