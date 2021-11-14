import React, { useCallback, useState, useEffect } from 'react'

/**
 * html要素のID名を受け取り、パースして返します
 *
 * @param {*} elementId
 * @returns
 */
const BuildParsedData = (elementId) => {
    const element = document.getElementById(elementId)

    if (element !== null && element.dataset.stocks !== '') {
        return JSON.parse(element.dataset.stocks)
    }

    return []
}

export default BuildParsedData
