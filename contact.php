<?php
// Pastikan mengganti URL ini dengan URL sebenarnya dari layanan pihak ketiga
$api_url = "https://api.example.com/send-to-whatsapp";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Ganti dengan nomor WhatsApp yang diinginkan
    $whatsapp_number = "08813870407";

    // Persiapkan data yang akan dikirim ke layanan pihak ketiga
    $data = array(
        'name' => $name,
        'email' => $email,
        'subject' => $subject,
        'message' => $message,
        'whatsapp_number' => $whatsapp_number
    );

    // Konfigurasi cURL
    $ch = curl_init($api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    // Eksekusi cURL untuk mengirim data ke layanan pihak ketiga
    $result = curl_exec($ch);

    // Tangani respons dari layanan pihak ketiga
    if ($result) {
        // Pesan berhasil terkirim
        echo "Your message has been sent. Thank you!";
    } else {
        // Pesan gagal terkirim
        echo "Error sending message. Please try again later.";
    }

    // Tutup koneksi cURL
    curl_close($ch);
} else {
    // Jika bukan metode POST, mungkin ada aksi tambahan yang diperlukan
    echo "Invalid request method.";
}
?>
