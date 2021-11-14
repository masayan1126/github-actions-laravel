import React, { useCallback, useState, useEffect } from 'react'
import Quagga from 'quagga'
import RakutenSearchForm from './Form/RakutenSearchForm'

const BarcodeReader = (props) => {
    useEffect(() => {
        Quagga.init(
            {
                inputStream: {
                    type: 'LiveStream',
                    target: document.querySelector('#interactive'),
                    // バックカメラの利用を設定. (フロントカメラは"user")
                    constraints: { facingMode: 'environment' },
                    // 検出範囲の指定: 上下30%は対象外
                    area: { top: '30%', right: '0%', left: '0%', bottom: '30%' }
                },
                decoder: {
                    readers: [
                        {
                            format: 'ean_reader',
                            config: {},
                            multiple: false
                        }
                    ]
                }
            },
            (err) => {
                if (!err) {
                    Quagga.start()
                }
            }
        )

        // Quagga.onProcessed((result) => {
        //     console.log(result)
        //     var drawingCtx = Quagga.canvas.ctx.overlay,
        //         drawingCanvas = Quagga.canvas.dom.overlay

        //     if (result) {
        //         if (result.boxes) {
        //             drawingCtx.clearRect(
        //                 0,
        //                 0,
        //                 parseInt(drawingCanvas.getAttribute('width')),
        //                 parseInt(drawingCanvas.getAttribute('height'))
        //             )
        //             result.boxes
        //                 .filter(function (box) {
        //                     return box !== result.box
        //                 })
        //                 .forEach(function (box) {
        //                     Quagga.ImageDebug.drawPath(
        //                         box,
        //                         { x: 0, y: 1 },
        //                         drawingCtx,
        //                         { color: 'green', lineWidth: 2 }
        //                     )
        //                 })
        //         }

        //         if (result.box) {
        //             Quagga.ImageDebug.drawPath(
        //                 result.box,
        //                 { x: 0, y: 1 },
        //                 drawingCtx,
        //                 { color: '#00F', lineWidth: 2 }
        //             )
        //         }

        //         if (result.codeResult && result.codeResult.code) {
        //             Quagga.ImageDebug.drawPath(
        //                 result.line,
        //                 { x: 'x', y: 'y' },
        //                 drawingCtx,
        //                 { color: 'red', lineWidth: 3 }
        //             )
        //         }
        //     }
        // })

        Quagga.onDetected((result) => {
            const code = result.codeResult.code
            props.setBarCode(code)
            console.log(code)
        })
    }, [])

    return (
        <>
            <div id="interactive" className="viewport barcodeReaderContainer" />
            <RakutenSearchForm
                barcode={props.barcode}
                inputBarCode={props.inputBarCode}
                setBarCode={props.setBarCode}
                fetchRakutenProducts={() => props.fetchRakutenProducts()}
            />
        </>
    )
}

export default BarcodeReader
