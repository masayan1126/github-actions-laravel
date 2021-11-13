import React, { useState, useEffect, useCallback } from 'react'
import ReactDOM from 'react-dom'
import Table from '../../Organisms/Table/Table'
import Button from '../../Atoms/Button/Button'
import AddStockModal from '../../Organisms/Modal/AddStockModal'
import axios from 'axios'

const Stock = () => {
    const element = document.getElementById('stock')
    const e = document.getElementById('rakuten-item-list')
    var stockList = []

    if (element && element.dataset.stocks) {
        stockList = JSON.parse(element.dataset.stocks)
    }

    const [stocks, setStocks] = useState([])
    const [barcode, setBarCode] = useState('')
    const [rakutenItemList, setRakutenItemList] = useState([])

    const inputBarCode = useCallback(
        (event) => {
            setBarCode(event.target.value)
        },
        [setBarCode]
    )

    const fetchRakutenProducts = () => {
        axios
            .get('/api/products/search', {
                params: {
                    // ここにクエリパラメータを指定する
                    barcode: barcode
                }
            })
            .then((res) => {
                const rakutenProducts = res.data
                setRakutenItemList(rakutenProducts)
            })
    }

    useEffect(() => {
        setStocks(stockList)
    }, [])

    return (
        <div className="container">
            <h4>在庫一覧</h4>
            <div className="text-right">
                <Button
                    className={'btn btn-primary'}
                    buttonName={'在庫を追加する'}
                    dataToggle="modal"
                    dataTarget="#exampleModal"
                />
            </div>
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
            <AddStockModal
                barcode={barcode}
                inputBarCode={inputBarCode}
                setBarCode={setBarCode}
                fetchRakutenProducts={() => fetchRakutenProducts()}
                list={rakutenItemList}
                addStock={() => addStock()}
            />
        </div>
    )
}

export default Stock

if (document.getElementById('stock')) {
    ReactDOM.render(<Stock />, document.getElementById('stock'))
}
