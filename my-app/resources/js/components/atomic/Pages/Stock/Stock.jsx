import AddStockModal from '../../Organisms/Modal/AddStockModal'
import axios from 'axios'
import React, { useState, useEffect, useCallback } from 'react'
import ReactDOM from 'react-dom'
import StockTable from '../../Organisms/Table/StockTable'
import BuildParsedData from '../../../shared/function/BuildParsedData'
import ModalOpenButton from '../../Atoms/Button/ModalOpenButton'

const Stock = () => {
    var stockList = []
    stockList = BuildParsedData('stock')

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
                    barcode: barcode
                }
            })
            .then((res) => {
                setRakutenItemList(res.data)
            })
    }

    useEffect(() => {
        setStocks(stockList)
    }, [])

    return (
        <div className="container">
            <h4>在庫一覧</h4>
            <div className="text-right">
                <ModalOpenButton
                    className={'btn btn-primary'}
                    buttonName={'在庫を追加'}
                    dataToggle="modal"
                    dataTarget="#addStockModal"
                />
            </div>
            <StockTable
                headerList={[
                    '商品ID',
                    '商品画像',
                    '商品名',
                    '在庫数',
                    '賞味期限',
                    'ー',
                    'ー'
                ]}
                dataList={stocks}
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
