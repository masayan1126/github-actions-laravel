import React, { useState, useEffect } from 'react'
import ReactDOM from 'react-dom'
import Table from '../../Organisms/Table/Table'

const Stock = () => {
    const element = document.getElementById('stock')
    var stockList = []

    if (element && element.dataset.stocks) {
        stockList = JSON.parse(element.dataset.stocks)
    }

    const [stocks, setStocks] = useState([])

    useEffect(() => {
        setStocks(stockList)
    }, [])

    return (
        <div className="container">
            <h4>在庫一覧</h4>
            <Table
                headerList={[
                    '商品ID',
                    '商品画像',
                    '商品名',
                    '在庫数',
                    '賞味期限'
                ]}
                dataList={stocks}
                formInfo={[
                    { action: '/stocks/edit/', method: 'GET' },
                    { action: '/stocks/delete/', method: 'POST' }
                ]}
            />
        </div>
    )
}

export default Stock

if (document.getElementById('stock')) {
    ReactDOM.render(<Stock />, document.getElementById('stock'))
}
