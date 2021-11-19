import AddStockModal from '../../Organisms/Modal/AddStockModal'
import axios from 'axios'
import React, { useState, useEffect, useCallback } from 'react'
import ReactDOM from 'react-dom'
import StockTable from '../../Organisms/Table/StockTable'
import BuildParsedData from '../../../shared/function/BuildParsedData'
import ModalOpenButton from '../../Atoms/Button/ModalOpenButton'
import DisplayMode from '../../../shared/variable/DisplayMode'

const Stocks = () => {
    var stockList = []
    stockList = BuildParsedData('stocks')

    const [stocks, setStocks] = useState([])
    const [barcode, setBarCode] = useState('')
    const [rakutenItemList, setRakutenItemList] = useState([])
    const [isEditMode, setIsEditMode] = useState(false)

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

    const toggleMode = (e) => {
        if (isEditMode) {
            document.getElementById('hoge').focus()
        }
        setIsEditMode(!isEditMode)
        console.log(e.target.id)
    }

    useEffect(() => {
        setStocks(stockList)
    }, [])

    return (
        <div className="container">
            <div className="flex justify-between mb-4">
                <h4>在庫一覧</h4>
                <DisplayMode isEditMode={isEditMode} />
            </div>
            <div className="text-right mb-5">
                <ModalOpenButton
                    className={
                        'bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center'
                    }
                    buttonName={'在庫を追加'}
                    dataToggle="modal"
                    dataTarget="#addStockModal"
                />
            </div>

            <StockTable
                headerList={[
                    '商品画像',
                    '商品名',
                    '在庫数',
                    '賞味期限',
                    'ー',
                    'ー'
                ]}
                dataList={stocks}
                isEditMode={isEditMode}
                toggleMode={toggleMode}
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

export default Stocks

if (document.getElementById('stocks')) {
    ReactDOM.render(<Stocks />, document.getElementById('stocks'))
}
