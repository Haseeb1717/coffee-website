<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if (! $user || $user->role !== 'admin') {
            abort(403, 'Only admins can access the admin dashboard.');
        }

        $userName = $user->name;
        $customerCount = User::query()->where('role', 'customer')->count();

        $metrics = [
            [
                'class' => 'm-sales',
                'label' => "Today's Sales",
                'value' => '$' . number_format(1200 + ($customerCount * 160), 0),
                'trend' => '▲ ' . number_format(8 + ($customerCount * 0.2), 1) . '%',
                'detail' => 'vs yesterday',
                'trendClass' => 'up',
            ],
            [
                'class' => 'm-orders',
                'label' => 'Total Orders',
                'value' => number_format(1200 + $customerCount * 20, 0),
                'trend' => '▲ ' . number_format(6 + ($customerCount * 0.1), 1) . '%',
                'detail' => 'this week',
                'trendClass' => 'up',
            ],
            [
                'class' => 'm-revenue',
                'label' => 'Total Revenue',
                'value' => '$' . number_format(250000 + ($customerCount * 4500), 0),
                'trend' => '▲ ' . number_format(5 + ($customerCount * 0.08), 1) . '%',
                'detail' => 'this month',
                'trendClass' => 'up',
            ],
            [
                'class' => 'm-customers',
                'label' => 'Customers',
                'value' => number_format($customerCount * 100 + 2000, 0),
                'trend' => '▼ ' . number_format(2 + ($customerCount * 0.05), 1) . '%',
                'detail' => 'vs last week',
                'trendClass' => 'down',
            ],
        ];

        $orders = [
            [
                'name' => 'Alice Morgan',
                'email' => 'alice@mail.com',
                'order_id' => '#ORD-7841',
                'date' => 'Aug 5',
                'amount' => '$248.00',
                'status' => 'Paid',
                'statusClass' => 'b-paid',
                'avatar' => 'AM',
                'avatarClass' => 'a1',
            ],
            [
                'name' => 'Brian Kim',
                'email' => 'brian.k@mail.com',
                'order_id' => '#ORD-7840',
                'date' => 'Aug 5',
                'amount' => '$1,120.00',
                'status' => 'Shipped',
                'statusClass' => 'b-shipped',
                'avatar' => 'BK',
                'avatarClass' => 'a2',
            ],
            [
                'name' => 'Carla Silva',
                'email' => 'carla.s@mail.com',
                'order_id' => '#ORD-7839',
                'date' => 'Aug 4',
                'amount' => '$84.50',
                'status' => 'Pending',
                'statusClass' => 'b-pending',
                'avatar' => 'CS',
                'avatarClass' => 'a3',
            ],
        ];

        $products = [
            [
                'emoji' => '☕',
                'name' => 'Espresso Blend Premium',
                'meta' => 'Beans · ' . ($customerCount + 1200) . ' sold',
                'progress' => '92%',
                'amount' => '$' . number_format(24800 + ($customerCount * 120), 0),
                'count' => '92%',
            ],
            [
                'emoji' => '🥐',
                'name' => 'Butter Croissant',
                'meta' => 'Pastry · ' . ($customerCount + 900) . ' sold',
                'progress' => '78%',
                'amount' => '$' . number_format(9600 + ($customerCount * 80), 0),
                'count' => '78%',
            ],
            [
                'emoji' => '🫖',
                'name' => 'Chai Latte Mix',
                'meta' => 'Beverage · ' . ($customerCount + 600) . ' sold',
                'progress' => '60%',
                'amount' => '$' . number_format(12800 + ($customerCount * 100), 0),
                'count' => '60%',
            ],
        ];

        $stockAlerts = [
            [
                'icon' => '⚠',
                'title' => 'Espresso Blend Premium',
                'subtitle' => 'SKU: EBP-001 · Supplier: BeanCorp',
                'state' => 'Out of stock',
                'stateClass' => 'stock-out',
                'iconClass' => 'al-err',
            ],
            [
                'icon' => '📦',
                'title' => 'Butter Croissant',
                'subtitle' => 'SKU: BC-014 · 8 units left',
                'state' => 'Low',
                'stateClass' => 'stock-low',
                'iconClass' => 'al-warn',
            ],
        ];

        $notifications = [
            [
                'icon' => '✓',
                'iconClass' => 'n-ok',
                'message' => '<b>New order</b> placed by ' . $user->name . ' for ' . ($customerCount + 1) . ' customers',
                'time' => '2 minutes ago',
            ],
            [
                'icon' => '⚠',
                'iconClass' => 'n-warn',
                'message' => '<b>Espresso Blend Premium</b> is running low',
                'time' => '18 minutes ago',
            ],
            [
                'icon' => '★',
                'iconClass' => 'n-acc',
                'message' => '<b>' . $customerCount . ' new customers</b> registered today',
                'time' => '5 hours ago',
            ],
        ];

        return view('admin.dashboard', compact(
            'user',
            'userName',
            'customerCount',
            'metrics',
            'orders',
            'products',
            'stockAlerts',
            'notifications'
        ));
    }
}
