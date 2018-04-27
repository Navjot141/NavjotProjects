//
//  RatingControl.swift
//  mapproject
//
//  Created by Jinal on 2018-03-17.
//  Copyright © 2018 Jinal. All rights reserved.
//
import  Foundation
import UIKit

class RatingControl: UIStackView {

   private var ratingButtons = [UIButton]()
    
    var rating = 0{
        didSet{
    updateButtonSelectionStates()
        }
    }
    override init(frame: CGRect){
        super.init(frame: frame)
        setupButtons()
    }
    required init(coder: NSCoder) {
        super.init(coder: coder)
        setupButtons()
    }
    private func updateButtonSelectionStates(){
        for(index,button) in ratingButtons.enumerated(){
            button.isSelected = index < rating
        }
    }
    private func setupButtons(){
        for button in ratingButtons {
            removeArrangedSubview(button)
            button.removeFromSuperview()
        }
        ratingButtons.removeAll()
        let filledStar = #imageLiteral(resourceName: "StarFull.png")
        let emptyStar = #imageLiteral(resourceName: "StarEmpty.png")
        for _ in 0..<5{
            let button = UIButton()
            button.setImage(emptyStar, for: .normal)
            button.setImage(filledStar, for: .highlighted)
            button.setImage(filledStar, for: .selected)
            button.setImage(filledStar, for: [.highlighted, .selected])
            button.translatesAutoresizingMaskIntoConstraints = false
            button.heightAnchor.constraint(equalToConstant: 44.0).isActive = true
            button.widthAnchor.constraint(equalToConstant: 44.0).isActive = true
            addArrangedSubview(button)
            ratingButtons.append(button)
        }
        
    }
}
