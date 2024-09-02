<div class="tab-pane fade p-2" id="tester-tab-pane" role="tabpanel" aria-labelledby="tester-tab" tabindex="0">
    <table>
        <thead>
            <tr>
                @php
                    for ($i = 1; $i < 31; $i++) {
                        echo "<th class='border-1 py-1 px-2 bg-red-600 text-white text-center'> $i </th>";
                    }
                @endphp
            </tr>
        </thead>
        <tbody>
            <tr>
                @php
                    $cek = "<i class='fa-solid fa-check text-black'></i>";

                    for ($i = 1; $i < 31; $i++) {
                        echo "<td class='border-1 py-1 px-2 text-white'>$cek</td>";
                    }
                @endphp
            </tr>
        </tbody>
    </table>

    <br>

    <table>
        <tr class="bg-blue-600 text-white text-center">
            <th class="border-1 py-1 px-2">H</th>
            <th class="border-1 py-1 px-2">S</th>
            <th class="border-1 py-1 px-2">I</th>
            <th class="border-1 py-1 px-2">A</th>
        </tr>
        <tr>
            <td class="py-1 px-2 border-1">30</td>
            <td class="py-1 px-2 border-1">0</td>
            <td class="py-1 px-2 border-1">0</td>
            <td class="py-1 px-2 border-1">0</td>
        </tr>
    </table>
</div>
