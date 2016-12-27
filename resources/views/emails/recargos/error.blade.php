<div>
    <h2>Error! Resultado Procesamiento de Recargos - Semana {{$semana}} ({{$anio}})</h2>
    <table style="border: 1px solid; width: 100%">
        <thead>
        <tr style="border: 1px solid">
            <th style="border: 1px solid">
                Fecha
            </th>
            <th style="border: 1px solid">
                Resultado
            </th>
        </tr>
        </thead>
        <tbody>
        <tr style="border: 1px solid">
            <td style="border: 1px solid">
                {{$fecha}}
            </td>
            <td style="border: 1px solid">
                <strong style="color:red">Error</strong>
            </td>
        </tr>
        </tbody>
    </table>
    <pre>{{$error}}</pre>
</div>