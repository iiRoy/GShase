const { rows, inserted, updated, errors, warnings } = await client.upsertTableRows({
    table: 'articulosTable',
    keyColumn: 'id',
    rows: [
      {
        tema: 'test',
        'autor(es)': 'test',
        titulo_articulo: 'test',
        documento_articulos: 'test'
      }
    ]
  })