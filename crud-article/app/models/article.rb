class Article < ApplicationRecord
    belongs_to :author
    validates :title, presence: true
    validates :title, length: { maximum: 140 }
    validates :content, length: { maximum: 255 }
end
