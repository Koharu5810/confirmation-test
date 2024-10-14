<div>

    <!-- Modal -->
    @if ($showModal)
        <div class="fixed inset-0 flex items-center justify-center z-50">
            <div class="modal-overlay" wire:click="closeModal"></div>
            <div class="modal-content bg-white p-6 rounded-lg shadow-lg">
                <button wire:click="closeModal()" type="button" class="modal-close">✕</button>
                <div class="modal-body">
                    <table class="modal-group">
                        <tr class="modal-row">
                            <th class="modal-ttl">お名前</th>
                            <td class="modal-content">{{ $contact['last_name'] }} {{ $contact['first_name'] }}
                            </td>
                        </tr>
                        <tr class="modal-row">
                            <th class="modal-ttl">性別</th>
                            <td class="modal-content">{{ $contact['gender_text'] }}</td>
                        </tr>
                        <tr class="modal-row">
                            <th class="modal-ttl">メールアドレス</th>
                            <td class="modal-content">{{ $contact['email'] }}</td>
                        </tr>
                        <tr class="modal-row">
                            <th class="modal-ttl">電話番号</th>
                            <td class="modal-content">{{ $contact['tell'] }}</td>
                        </tr>
                        <tr class="modal-row">
                            <th class="modal-ttl">住所</th>
                            <td class="modal-content">{{ $contact['address'] }}</td>
                        </tr>
                        <tr class="modal-row">
                            <th class="modal-ttl">建物名</th>
                            <td class="modal-content">{{ $contact['building'] }}</td>
                        </tr>
                        <tr class="modal-row">
                            <th class="modal-ttl">お問い合わせの種類</th>
                            <td class="modal-content">{{ $contact['content'] }}</td>
                        </tr>
                        <tr class="modal-row">
                            <th class="modal-ttl">お問い合わせ内容</th>
                            <td class="modal-content">{{ $contact['detail'] }}</td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button>削除</button>
                </div>
            </div>
        </div>
    @endif
</div>

<style>
    .modal-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
    }
</style>
