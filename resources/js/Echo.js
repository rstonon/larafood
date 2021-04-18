window.Echo.channel('larafood_database_private-order-created.${tenantId}')
    .listen('OrderCreated', (e) => {
        Bus.$emit('order.created', e.order)

        Vue.$vToastify.success(`Novo pedido ${e.order.identify}`, 'Novo Pedido')
    })
