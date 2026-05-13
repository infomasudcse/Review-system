<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Support\Str;

class DemoDataSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first() ?? User::factory()->create([
            'name' => 'Demo User',
            'email' => 'demo@example.com',
        ]);

        // Create 3 clients
        $clients = Client::factory()->count(3)->create([
            'user_id' => $user->id,
        ]);

        foreach ($clients as $client) {
            $invoice = Invoice::create([
                'user_id' => $user->id,
                'client_id' => $client->id,
                'invoice_number' => 'INV-' . Str::random(5),
                'invoice_date' => now(),
                'due_date' => now()->addDays(7),
                'notes' => 'Sample invoice',
                'total' => 0, // will update
            ]);

            $total = 0;

            for ($i = 1; $i <= 3; $i++) {
                $qty = rand(1, 5);
                $price = rand(100, 500);
                $lineTotal = $qty * $price;

                InvoiceItem::create([
                    'invoice_id' => $invoice->id,
                    'description' => "Service $i",
                    'quantity' => $qty,
                    'unit_price' => $price,
                    'total' => $lineTotal,
                ]);

                $total += $lineTotal;
            }

            $invoice->update(['total' => $total]);
        }
    }
}
